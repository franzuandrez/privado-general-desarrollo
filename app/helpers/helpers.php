<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('current_user')) {
    function current_user()
    {
        return 1;
    }
}

if (!function_exists('user_login')) {
    function user_login()
    {
        $user = Auth::user();
        return $user->nombres . ' ' . $user->apellidos;
    }
}
