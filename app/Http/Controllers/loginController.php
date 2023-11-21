<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class loginController extends Controller
{
    public function index()
    {
        return view('login'
    );
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $cred=$request->validate([
            'username' => 'required',
            'password'=> 'required',
        ]);

        $user=$request->input('username');
        $pass=$request->input('password');

        if (Auth::attempt($cred)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
            
        }

        return back()->with('error','Salah');
}
}
