<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseCreateRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Models\Course;
use App\Models\CourseDay;
use App\Models\CourseInstallment;
use App\Models\CourseStudent;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('category')->get();
        return response()->json([
            'courses' => $courses
        ]);
    }

    public function show($id)
    {
        $course = Course::with('courseDays', 'category', 'students', 'mentor')->findOrFail($id);
        return response()->json([
            'course' => $course
        ]);
    }

    public function store(CourseCreateRequest $request)
    {
        $courseData = $request->all();
        $courseData['student_count'] = count($request->students);
        $course = Course::create($courseData);
        $course->courseDays()->createMany($request->course_days);
        $courseStudents = $this->addStudentsToCourse($request->students, $course);

        return response()->json([
            'course' => $course,
            'course_students' => $courseStudents
        ]);
    }

    protected function addStudentsToCourse(array $studentsData, Course $course)
    {
        return collect($studentsData)->map(function ($studentData) use ($course) {
            $courseStudent = $this->createCourseStudent($studentData, $course);

            if (isset($studentData['installment_data'])) {
                $this->createCourseInstallment($studentData['installment_data'], $courseStudent);
            }

            return $courseStudent;
        });
    }

    protected function createCourseStudent(array $studentData, Course $course)
    {
        $studentData['course_id'] = $course->id;
        $studentData['student_status'] = 'active';
        $studentData['is_supplement'] = false;

        return CourseStudent::create($studentData);
    }

    protected function createCourseInstallment(array $installmentData, CourseStudent $courseStudent)
    {
        $installmentData['course_student_id'] = $courseStudent->id;
        $installmentData['tuition'] = $this->calculateTuition($installmentData);

        CourseInstallment::create($installmentData);
    }

    protected function calculateTuition(array $installmentData)
    {
        $duringCount = $installmentData['during_course_installment_count'];
        $duringAmount = $installmentData['during_course_installment_amount'];
        $afterCount = $installmentData['after_course_installment_count'];
        $afterAmount = $installmentData['after_course_installment_amount'];

        $totalDuring = $duringCount * $duringAmount;
        $totalAfter = $afterCount * $afterAmount;

        $tuition = $totalDuring + $totalAfter;

        return $tuition;
    }

    public function update(CourseUpdateRequest $request, $id)
    {
        $course = Course::findOrFail($id);

        if ($request->filled('course_number')) {
            if (Course::where('course_number', $request->course_number)->where('id', '!=', $course->id)->exists()) {
                return response()->json([
                    'message' => 'Course number must be unique'
                ]);
            }
        }
        $courseData = $request->validated();
        $courseData['course_number'] = $request->course_number;
        $courseData['student_count'] = count($request->students);

        $course->update($courseData);

        $this->updateCourseDays($course, $request->course_days);

        collect($request->students)->each(function ($studentData) use ($course) {
            $courseStudent = CourseStudent::where('course_id', $course->id)
                ->where('student_id', $studentData['student_id'])
                ->first();

            if ($courseStudent) {
                $courseStudent->update($studentData);

                if (isset($studentData['installment_data'])) {
                    $courseInstallment = CourseInstallment::where('course_student_id', $courseStudent->id)->first();

                    if ($courseInstallment) {
                        $courseInstallment->update($studentData['installment_data']);
                    } else {
                        $studentData['installment_data']['course_student_id'] = $courseStudent->id;
                        CourseInstallment::create($studentData['installment_data']);
                    }
                }
            } else {
                $studentData['course_id'] = $course->id;
                $courseStudent = CourseStudent::create($studentData);

                if (isset($studentData['installment_data'])) {
                    $studentData['installment_data']['course_student_id'] = $courseStudent->id;
                    CourseInstallment::create($studentData['installment_data']);
                }
            }
        });

        return response()->json([
            'course' => $course,
            'message' => 'Course updated successfully'
        ]);
    }

    protected function updateCourseDays(Course $course, array $courseDays)
    {
        // Delete all existing course days
        $course->courseDays()->delete();

        // Create new course days
        foreach ($courseDays as $day) {
            $course->courseDays()->create($day);
        }
    }
    public function getCoursesByCategory($category_id)
    {
        $courses = Course::where('sub_category_id', $category_id)->get();
        return response()->json([
            'courses' => $courses
        ]);
    }
}
