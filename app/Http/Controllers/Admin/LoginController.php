<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login()
    {
        dd('ahe');
        return view('admin.auth.login');
    }
}
