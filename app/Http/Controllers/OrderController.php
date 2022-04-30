<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Cart_items;
use App\Models\Order_item;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // paimti vartotojo krepšelio prekes
        $cart_items = Cart_items::with(['product'])->whereIn('id', $request->cart_items)->get();

        // pakeisti prekių kiekį į toki koks buvo nustatytas krepšelyje
        foreach ($cart_items as $i => $item)
        {
            $item->quantity = $request->cart_items_quantity[$i];
            $item->save();
        }

        $credentials = [
            'firstName' => '',
            'lastName' => '',
            'E-mail' => '',
            'telephoneNr' => '',
            'address' => ''
        ];

        // jei vartotojas prisijungęs - užpildyti informaciją
        if (auth()->user() != null)
        {
            $credentials = [
                'firstName' => auth()->user()->first_name,
                'lastName' => auth()->user()->last_name,
                'E-mail' => auth()->user()->email,
                'telephoneNr' => auth()->user()->tel_number,
                'address' => auth()->user()->address
            ];
        }

        return view('order', [
            'credentials' => $credentials,
            'cart_items' => $cart_items
        ]);
    }

    public function store(Request $request)
    {

        // patvirtinti ar info gerai suvesta
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'tel' => 'required|max:255',
            'address' => 'required|max:255',
            'payment_type' => 'required'
        ]);

        // rasti pirkeją duomenų bazėje pagal device_id, kad butu patvirtinta tapatybė
        // Jie yra duomenų pakitimas - išsaugoti

        $cart = Cart::find($request->cart_id);
        if ($_COOKIE['device'] == $cart->user->device)
        {
            $cart->user->first_name = $request->first_name;
            $cart->user->last_name = $request->last_name;
            $cart->user->email = $request->email;
            $cart->user->tel_number = $request->tel;
            $cart->user->address = $request->address;
            $cart->user->save();
        }

        // sukurti užsakymą
        $order = Order::create([
            'user_id' => $cart->user->id,
            'status' => 'new order',
            'payment' => $request->payment_type,
        ]);

        // prideti produktus i užsakytus produktus
        foreach ($cart->Cart_items as $item)
        {
            $order_items = Order_item::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity
            ]);
        }

        // atlaisvinti krepšelį
        Cart_items::where('cart_id', $cart->id)->delete();

        // parodyti užsakymą vartotojui
        return redirect()->route('home');
        // with...
    }
}
