<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\EducationData;
use App\Models\MentorData;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MentorController extends Controller
{
    public function create(Request $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'national_id' => $request->national_id,
            'password' => $request->national_id,
        ]);

        $mentor_data = MentorData::create([
            'user_id' => $user->id,
            'work_address' => $request->work_address,
            'education_degree' => $request->education_degree,
            'education_degree_university' => $request->education_degree_university,
            'representative' => $request->representative,
            'skills' => json_encode($request->skills),
            'work_experience' => json_encode($request->work_experience),
        ]);


        $user->load(['MentorData']);

        return response()->json([
            'message' => 'user registered successfully.',
            'user' => $user
        ]);
    }

    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'national_id' => $request->national_id,
            'password' => $request->national_id,
        ]);

        $mentor_data = MentorData::findOrFail($user->id);
        $mentor_data->update([
            'user_id' => $user->id,
            'work_address' => $request->work_address,
            'education_degree' => $request->education_degree,
            'education_degree_university' => $request->education_degree_university,
            'representative' => $request->representative,
            'skills' => json_encode($request->skills),
            'work_experience' => json_encode($request->work_experience),
        ]);

        $user->load(['MentorData']);

        return response()->json([
            'message' => 'user edited successfully.',
            'user' => $user
        ]);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        $user->load(['MentorData']);

        return response()->json([
            'user' => $user
        ]);
    }

    public function delete($id)
    {
        try {
            $user = User::with(['MentorData'])->findOrFail($id);

            $user->delete();

            return response()->json([
                'message' => 'User deleted successfully.'
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'The desired user was not found.'], 404);
        }
    }
}
