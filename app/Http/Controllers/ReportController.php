<?php

namespace App\Http\Controllers;

use App\Models\CourseStudent;
use App\Models\Report;
use App\Models\SubReport;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function createReport(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'course_student_id' => 'required|integer|exists:course_students,id',
            'subReports' => 'nullable|array',
            'subReports.*.base_time' => 'required_with:subReports|integer',
            'subReports.*.edited_time' => 'nullable|integer',
            'subReports.*.explanation' => 'required_with:subReports|string',
        ]);

        // Check if the current time is before 6 PM
        $now = Carbon::now('Asia/Tehran');

        // Check if a report for the previous day exists
        $previousDay = $now->copy()->subDay();
        $course_student = CourseStudent::find($request->course_student_id);
        $course_days = $course_student->course->Days();

        if (!in_array($previousDay->dayOfWeekIso, $course_days)) {
            $previousReport = Report::where('course_student_id', $validatedData['course_student_id'])
                ->where('date', $previousDay->toDateString())
                ->first();

            if (!$previousReport && $now->hour < 22) {
                // Create a report for the previous day with time_status 'black' and time 0
                $previousReport = new Report([
                    'course_student_id' => $validatedData['course_student_id'],
                    'date' => $previousDay->toDateString(),
                    'time' => 0,
                    'overall_status' => 'pending',
                    'time_status' => 'black',
                ]);
                $previousReport->save();
            } elseif (!$previousReport) {
                return response()->json(['message' => 'You must first submit the report for ' . $previousDay->format('l')], 400);
            }
        }
        if ($now->hour < 18) {
            return response()->json(['message' => 'A report cannot be submitted before 6 PM'], 400);
        }

        // Check if today is Tuesday or Friday
        if (in_array($previousDay->dayOfWeekIso, $course_days)) {
            return response()->json(['message' => 'There is no need to submit a report on Tuesdays and Fridays'], 200);
        }

        // Create SubReport instances for each subreport in the request and calculate the time
        $time = 0;
        $subReports = null;
        if (isset($validatedData['subReports'])) {
            $subReports = collect($validatedData['subReports'])->map(function ($subReportData) {
                $subReport = new SubReport($subReportData);
                $subReport->save();
                return $subReport;
            });

            // Calculate the time
            $time = $subReports->reduce(function ($carry, $subReport) {
                return $carry + ($subReport->edited_time ?? $subReport->base_time);
            }, 0);
        }

        // Calculate the time_status
        $time_status = 'green';
        if ($now->hour == 22 && $now->minute > 15 && $now->minute <= 30) {
            $time_status = 'yellow';
            $time -= $now->minute - 15;
        } elseif ($now->hour > 22 || ($now->hour == 22 && $now->minute > 30)) {
            $time_status = 'red';
            $time = 0;
        }

        // Create the report
        $report = new Report([
            'course_student_id' => $validatedData['course_student_id'],
            'date' => $now->toDateString(),
            'time' => $time,
            'overall_status' => 'pending',
            'time_status' => $time_status,
        ]);
        $report->save();

        // Update the report_id of each subReport and save them
        if ($subReports) {
            $subReports->each(function ($subReport) use ($report) {
                $subReport->report_id = $report->id;
                $subReport->save();
            });
        }

        return response()->json(['message' => 'Report created successfully'], 201);
    }

    public function updateReport(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'subReports' => 'nullable|array',
            'subReports.*.base_time' => 'required_with:subReports|integer',
            'subReports.*.edited_time' => 'nullable|integer',
            'subReports.*.explanation' => 'required_with:subReports|string',
        ]);

        // Check if the current time is between 6 PM and 10:15 PM
        $now = Carbon::now('Asia/Tehran');
        if ($now->hour < 18 || ($now->hour == 22 && $now->minute > 15)) {
            return response()->json(['message' => 'A report can only be updated between 6 PM and 10:15 PM'], 400);
        }

        // Check if a report for today exists
        $report = Report::where('course_student_id', $id)
            ->where('date', $now->toDateString())
            ->first();

        if (!$report) {
            return response()->json(['message' => 'No report for today to update'], 400);
        }

        // Update SubReport instances for each subreport in the request and calculate the time
        $time = 0;
        if (isset($validatedData['subReports'])) {
            $subReports = collect($validatedData['subReports'])->map(function ($subReportData) use ($report) {
                $subReport = SubReport::where('report_id', $report->id)
                    ->where('base_time', $subReportData['base_time'])
                    ->first();

                if ($subReport) {
                    $subReport->update($subReportData);
                } else {
                    $subReportData['report_id'] = $report->id;
                    $subReport = SubReport::create($subReportData);
                }

                return $subReport;
            });

            // Calculate the time
            $time = $subReports->reduce(function ($carry, $subReport) {
                return $carry + ($subReport->edited_time ?? $subReport->base_time);
            }, 0);
        }

        // Update the report
        $report->update([
            'time' => $time,
        ]);

        return response()->json(['message' => 'Report updated successfully'], 200);
    }

    public function reviewReport(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'overall_status' => 'required|string|in:accepted by mentor,rejected by mentor,edited by mentor,accepted by admin,rejected by admin,edited by admin',
            'comment' => 'nullable|string',
            'subReports' => 'nullable|array',
            'subReports.*.edited_time' => 'required_with:subReports|integer',
        ]);

        // Get the report
        $report = Report::findOrFail($id);

        // Check if the user is a mentor or an admin
        $user = auth()->user();
        if ($user->role == 'mentor') {
            // If the overall_status has been set by an admin, the mentor cannot change it
            if (strpos($report->overall_status, 'admin') !== false) {
                return response()->json(['message' => 'The report status has been set by an admin and cannot be changed by a mentor'], 400);
            }

            // Update the report
            $report->overall_status = $validatedData['overall_status'];
            $report->mentor_comment = $validatedData['comment'] ?? $report->mentor_comment;
        } else if ($user->role == 'admin') {
            // Update the report
            $report->overall_status = $validatedData['overall_status'];
            $report->admin_comment = $validatedData['comment'] ?? $report->admin_comment;
        } else {
            return response()->json(['message' => 'Only mentors and admins can review reports'], 400);
        }

        // If the overall_status is 'rejected', set the time to 0
        if (strpos($validatedData['overall_status'], 'rejected') !== false) {
            $report->time = 0;
        }

        // If the overall_status is 'edited', update the time and the subReports
        if (strpos($validatedData['overall_status'], 'edited') !== false && isset($validatedData['subReports'])) {
            $subReports = collect($validatedData['subReports'])->map(function ($subReportData) use ($report) {
                $subReport = SubReport::where('report_id', $report->id)
                    ->where('base_time', $subReportData['base_time'])
                    ->first();

                if ($subReport) {
                    $subReport->update($subReportData);
                }

                return $subReport;
            });

            // Calculate the time
            $time = $subReports->reduce(function ($carry, $subReport) {
                return $carry + $subReport->edited_time;
            }, 0);

            $report->time = $time;
        }

        $report->save();

        return response()->json(['message' => 'Report reviewed successfully'], 200);
    }
}
