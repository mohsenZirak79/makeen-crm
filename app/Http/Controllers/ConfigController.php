<?php

namespace App\Http\Controllers;

use App\Http\Resources\Config\ConfigResource;

class ConfigController extends Controller
{
    public function index()
    {
        return new ConfigResource();
    }
}
