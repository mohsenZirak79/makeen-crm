<?php

namespace App\Http\Controllers;

use App\Http\Requests\Config\UpdateConfigRequest;
use App\Http\Resources\Config\ConfigResource;
use App\Models\Config;

class ConfigController extends Controller
{
    public function index()
    {
        return new ConfigResource();
    }

    public function update(UpdateConfigRequest $request)
    {
        $validated = $request->all();
        foreach ($validated as $key => $value) {
            Config::where('key', $key)->update(['value' => $value]);
        }
        return response()->json([
            'message' => 'Config updated successfully'
        ]);
    }
}
