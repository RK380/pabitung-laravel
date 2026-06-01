<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Enums\UserRole;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | FORM LOGIN
    |--------------------------------------------------------------------------
    */

    public function login()
    {
        return view('auth.login');
    }

    /*
    |--------------------------------------------------------------------------
    | PROSES LOGIN
    |--------------------------------------------------------------------------
    */

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([

            'email' => ['required', 'email'],
            'password' => ['required'],

        ]);

        if(Auth::attempt($credentials)){

            $request->session()->regenerate();

            $user = Auth::user();

            return match($user->role){

                UserRole::OPERATOR =>
                    redirect()->route('operator'),

                UserRole::KETUA_MAJELIS =>
                    redirect()->route('hakim'),

                UserRole::HAKIM_TUNGGAL =>
                    redirect()->route('hakim2'),

                UserRole::PANITERA =>
                    redirect()->route('panitera'),

            };

        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);

    }

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}