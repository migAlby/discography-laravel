<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm(Request $request)
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' =>['required', 'email'],
            'password' =>['required'],
        ]);

        if(Auth::attempt($credentials))
            {
                $request->session()->regenerate();
                return redirect()->intended('/'); // '/' è la home, più avanti si puo fare la rout'/home'
            }

        return back()->withErrors([
            'email' => 'profilo non trovato, rivedi le credenziali'
        ])->onlyInput('email');

    }
    

    public function logout(Request $request)
    {
        Auth:: logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');

    }










































}
