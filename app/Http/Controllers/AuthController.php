<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
        ]);

        if(!auth()->attempt($request->only('email', 'password')))
        {
            return back()->with('status', 'Įvesti netinkami duomenys');
        }

        return redirect()->route('home');
    }

    public function registration()
    {
        return view('auth/registration');
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|max:255',
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        //prijungti prie paskyros
        if(!auth()->attempt($request->only('email', 'password')))
        {
            return back()->with('status', 'Įvesti netinkami duomenys');
        }

        return redirect()->route('home');
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->back();
    }
}
