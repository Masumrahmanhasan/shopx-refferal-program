<?php

if (!function_exists('get_settings')) {
    function get_settings($key) {
        $settings = \App\Models\Setting::query()
            ->where('key', $key)
            ->first();
        if (!$settings) {
            return null;
        }
        return $settings->value;
    }
}
