<?php

namespace App\Http\Controllers;

use App\Order;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // public function checkout() {
    //     $cart = Session::get('cart');
    //     $order = new Order();
    //     $order->cart = serialize($cart);
    //     Auth::user()->orders()->save($order);
    //
    //     Mail::to(Auth::user())->send(new OrderShipped($cart));
    //
    //     Session::forget('cart');
    //
    //     return redirect()->route('main.page');
    // }
    //
    // public function showToAdmin() {
    //     $orders = Order::all();
    //     return view('admin.orders.index', compact('orders'));
    // }
}
