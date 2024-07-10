<?php

use Illuminate\Support\Facades\Request;

if (!function_exists('active_page')) {
    function active_page($route)
    {
        $currentPath = Request::path();

        if (is_array($route)) {
            return in_array($currentPath, $route) ? 'active' : '';
        }

        return $currentPath == $route ? 'active' : '';
    }
}