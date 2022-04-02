<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Wishlist;
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

        setcookie('device', auth()->user()->device, time()+2629743, '/');

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

        // jei jau vartotojas yra duomenų bazėjė (yra pasinaudojęs cart is wish funkcijomis) - užregistruoti pilnai
        if ($user = User::where('device', $_COOKIE['device'])->first())
        {
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
    
            $user->save();
        }
        else
        {
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'device' => $_COOKIE['device'],
            ]);

            Cart::create(['user_id' => $user->id]);

            Wishlist::create(['user_id' => $user->id]);
        }


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
