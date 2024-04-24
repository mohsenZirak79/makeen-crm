<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerformanceController extends Controller
{
    public static function addScore($course_student_id, $technical_score)
    {
        // Validate the technical_score
        if ($technical_score < 1 || $technical_score > 10) {
            throw new \InvalidArgumentException('Technical score must be between 1 and 10.');
        }

        // Find the last record for the given course_student_id
        $lastRecord = self::where('course_student_id', $course_student_id)->orderBy('week_number', 'desc')->first();

        // Calculate the new week_number
        $week_number = $lastRecord ? $lastRecord->week_number + 1 : 1;

        // Create a new record
        return self::create([
            'course_student_id' => $course_student_id,
            'technical_score' => $technical_score,
            'week_number' => $week_number,
        ]);
    }
}
