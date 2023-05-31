<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthController extends Controller
{
    //function d'affichage du login
    public function showLogin()
    {
        return inertia("Auth/Login");
    }

    //function d'authentification
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Le champ email est obligatoire',
            'password.required' => 'Le champ mot de passe est obligatoire',
        ]);
        //verifier si l'utilisateur existe et si l'email correspond au mot de passe
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $defaultRoute = route('home');
            $intendedRoute = redirect()->intended($defaultRoute)->getTargetUrl();
            return Inertia::location($intendedRoute);
        }
        return back()->withErrors([
            'email' => "Paramètres d'authentification incorrects",
        ]);
    }

    //logout de l'utilisateur
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }














    //function d'affichage du register
    public function showRegister()
    {
        return inertia("Auth/Register");
    }
}
