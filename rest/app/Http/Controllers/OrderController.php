<?php

namespace App\Http\Controllers;

use App\Order;
use App\Cart;
use App\Dish;
use App\OrderItem;
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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkout()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->first();


        $order = new Order();
        $items = $cart->cartItems;
        $total_paid = 0;

        foreach ($items as $item) {
            $total_paid += $item->dish->price;
        }

        $order->total_paid = $total_paid;
        $order->user_id = $cart->user_id;
        $order->save();
        // dd($order->total_paid);

        $items = $cart->cartItems;

        foreach ($items as $item) {
            $orderItem = new OrderItem();
            $orderItem->dish_id = $item->dish->id;
            $orderItem->order_id = $order->id;
            $orderItem->save();
        }
    }
}
