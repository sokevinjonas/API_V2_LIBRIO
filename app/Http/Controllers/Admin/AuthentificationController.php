<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthentificationController extends Controller
{
    //
    public function loginForm()
    {
        return view('admin.auth.login');
    }

    public function authenticate(Request $request): RedirectResponse
    
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials, remember: true)) {
            $request->session()->regenerate();
 
            return redirect()->intended(route('admin.dashboard'));
        }
 
        return back()->withErrors([
            'email' => "Les informations d'identification fournies ne correspondent pas.",
        ])->onlyInput('email');
    }
}
