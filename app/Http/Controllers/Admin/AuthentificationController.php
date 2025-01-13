<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthentificationController extends Controller
{
    //
    public function loginForm()
    {
        return view('admin.auth.login');
    }

    function login(){}
}
