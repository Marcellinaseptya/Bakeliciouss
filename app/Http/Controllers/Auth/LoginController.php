<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    protected function redirectTo()
{
    if (Auth::check()) {
        if (Auth::user()->role == 'admin') {
            return '/admin/dashboard'; // Redirect ke admin
        } else {
            return '/landing'; // Redirect ke user (landing page)
        }
    }
}
}
