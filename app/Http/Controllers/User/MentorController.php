<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\MentorCreateEditRequest;
use App\Models\MentorData;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;



class MentorController extends Controller
{
    public function create(MentorCreateEditRequest $request)
    {
        $existingUser = User::where('email', $request->user['email'])->first();

        if ($existingUser) {
            return response()->json(['message' => 'This user is already registered'], 422);
        }
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
            'global_education_degree_id' => $request->global_education_degree_id,
            'global_education_major_id' => $request->global_education_major_id,
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

    public function edit(MentorCreateEditRequest $request, $id)
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
            'global_education_degree_id' => $request->education_degree,
            'global_education_major_id' => $request->education_degree,
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
