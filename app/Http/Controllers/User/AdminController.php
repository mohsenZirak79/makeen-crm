<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AdminData;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function create(Request $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'father_name' => $request->father_name,
            'phone_number' => $request->phone_number,
            'national_id' => $request->national_id,
            'password' => $request->national_id
        ]);

        $admin_data = AdminData::create([
            'user_id' => $user->id,
            'work_position' => $request->work_position
        ]);

        $user->load(['AdminData']);

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
            'father_name' => $request->father_name,
            'phone_number' => $request->phone_number,
            'national_id' => $request->national_id,
            'password' => $request->national_id
        ]);

        $admin_data = AdminData::findOrFail($user->id);

        $admin_data->update([
            'work_position' => $request->work_position
        ]);

        $user->load(['AdminData']);

        return response()->json([
            'message' => 'user edited successfully.',
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'father_name' => $request->father_name,
            'phone_number' => $request->phone_number,
            'national_id' => $request->national_id,
            'password' => $request->password
        ]);

        return response()->json([
            'message' => 'User updated successfully.',
            'user' => $user
        ]);
    }


    public function show($id)
    {
        $user = User::findOrFail($id);

        return response()->json([
            'user' => $user
        ]);
    }


    public function delete($id)
    {
        try {
            $user = User::with(['AdminData'])->findOrFail($id);

            $user->delete();

            return response()->json([
                'message' => 'User deleted successfully.'
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'The desired user was not found.'], 404);
        }
    }
}
