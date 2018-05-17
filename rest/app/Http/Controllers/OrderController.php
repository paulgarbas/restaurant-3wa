<?php

namespace App\Http\Controllers;

use App\Order;
use App\Cart;
use App\CartItem;
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

        $items = $cart->cartItems;
        $total_paid = 0;

        foreach ($items as $item) {
            $total_paid += $item->dish->price + round($item->dish->price * 0.21, 2);
        }

        $order = new Order();
        $order->total_paid = $total_paid;
        $order->user_id = $cart->user_id;
        $order->save();

        foreach ($items as $item) {
            $orderItem = new OrderItem();
            $orderItem->dish_id = $item->dish_id;
            $orderItem->order_id = $order->id;
            $orderItem->save();

            CartItem::destroy($item->id);
        }

        return redirect()->route('main.page');
    }

    public function showOrders() {
        $orders = Order::latest()->get();
        return view('user.orders', compact('orders'));
    }

    public function showOrderItems(Order $order) {
        $totalQuantity = count($order->orderItems);
        $totalPrice = 0;
        foreach($order->orderItems as $item) {
            $totalPrice += $item->dish->price;
        }
        return view('user.orderItems', compact('order', 'totalPrice', 'totalQuantity'));
    }

    public function showOrdersToAdmin() {
        $nr = 0;
        $orders = Order::latest()->get();
        return view('admin.orders.index', compact('orders', 'nr'));
    }

    public function showOrderItemsToAdmin(Order $order) {
        $totalQuantity = count($order->orderItems);
        $totalPrice = 0;
        foreach($order->orderItems as $item) {
            $totalPrice += $item->dish->price;
        }
        return view('admin.orders.orderItems', compact('order', 'totalPrice', 'totalQuantity'));
    }
}
