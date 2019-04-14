<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use App\Http\Controllers\User;
use Hash;
use Auth;
use \App\User;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['only' => 'showLoginForm']);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login()
    {
        info("Logeando...");
        /*
        $user = new \App\User();
        $user->password = Hash::make('test');
        $user->email = 'dazamar01@hotmail.com';
        $user->username = 'Daniel';
        $user->save();
        info("Creado!!!...");
        */

        $credentials = $this->validate(request(), [
            'email' => 'email|required|string',
            'password' => 'required|string'
        ]);

        info("OK?");

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }

        return back()
            ->withErrors(['email' => 'Usuario o contraseña incorrectos'])
            ->withInput(request(['email']));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
