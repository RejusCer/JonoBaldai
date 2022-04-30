<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index($userId)
    {
        $user = User::find($userId);

        return view('user.info', [
            'user' => $user
        ]);
    }

    public function change(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'tel_number' => 'max:9',
            'address' => 'max:255',
            'password' => 'required|confirmed|max:255',
        ]);

        $user = User::find(auth()->user()->id);
        
        if (!Hash::check($request->password, $user->password))
        {
            return back()->with('status', 'Netinkamas slaptažodis!');
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->tel_number = $request->tel_number;
        $user->address = $request->address;

        $user->save();

        return back()->with('status', 'Duomenys pakeisti sekmingai!');
    }

    public function destroyPage($userId)
    {
        return view('user.destroy');
    }

    public function destroy(Request $request, $userId)
    {
        $request->validate([
            'password' => 'required|confirmed|max:255'
        ]);

        $user = User::find($userId);

        if (!Hash::check($request->password, $user->password))
        {
            return back()->with('status', 'Netinkamas slaptažodis!');
        }

        auth()->logout();
        $user->delete();

        return redirect()->route('home');
    }

    public function orders($userId)
    {
        $Orders = Order::where('user_id', $userId)->get();

        return view('user.user_orders', [
            'Orders' => $Orders
        ]);
    }
}
