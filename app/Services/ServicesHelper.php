<?php

use App\Services\ConfigServiceProvider;

if (!function_exists('configServiceProvider')) {
    function configServiceProvider(): ConfigServiceProvider
    {
        return new ConfigServiceProvider();
    }
}