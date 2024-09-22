<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;

class SettingService
{
    public static function get($key, $default = null) {
        $setting = DB::table('settings')->where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }
}
