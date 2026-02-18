<?php

namespace App\Services;

use Illuminate\Support\Facades\Schema;

class SettingService
{
    public function getSettings()
    {
        $business = app('tenant')->business->name;
        $modelClass = "App\\Models\\Business\\{$business}\\Setting";
        if (class_exists($modelClass)) {
            $instance = new $modelClass;
            $setting = $instance::first();
            if ($setting) {
                return $setting;
            }
        }
        return false;
    }
}
