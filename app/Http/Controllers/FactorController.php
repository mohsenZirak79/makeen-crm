<?php

namespace App\Http\Controllers;

use App\Http\Requests\FactorCreateRequest;
use App\Http\Resources\Factor\FactorResource;
use App\Models\Factor;
use App\Models\User;
use Illuminate\Http\Request;

class FactorController extends Controller
{
    public function index()
    {

    }

    public function show(Factor $factor)
    {
        return FactorResource::make($factor);
    }

    public function create(FactorCreateRequest $request, User $user)
    {
        return response()->json($user->factors()->create($request->validated()));
    }

    public function update(Factor $factor)
    {

    }

    public function delete(Factor $factor)
    {

    }
}
