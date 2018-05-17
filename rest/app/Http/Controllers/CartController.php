<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\CartItem;
use App\Dish;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addItem($dishId)
    {
        $cart = Cart::where('user_id', Auth::user()->id)->first();

        if (!$cart) {
            $cart = new Cart();
            $cart->user_id = Auth::user()->id;
            $cart->save();
        }

        $cartItem = new CartItem();

        $cartItem->cart_id = $cart->id;
        $cartItem->dish_id = $dishId;
        $cartItem->save();

        return redirect()->back();
    }

    public function showCart()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->first();
        if (!$cart) {
            $cart = new Cart();
            $cart->user_id = Auth::user()->id;
            $cart->save();
        }

        $items = $cart->cartItems;
        $totalPrice = 0;
        $totalItems = count($cart->cartItems);

        foreach ($items as $item) {
            $totalPrice += $item->dish->price;
        }

        return view('cart.newIndex', compact('cart', 'items', 'totalPrice', 'totalItems'));
    }

    public function destroy(CartItem $cartItem) {
        $cartItem->delete();

        return redirect()->back();
    }

    public function addItemAjax($dishId)
    {
        $cart = Cart::where('user_id', Auth::user()->id)->first();

        if (!$cart) {
            $cart = new Cart();
            $cart->user_id = Auth::user()->id;
            $cart->save();
        }

        $cartItem = new CartItem();

        $cartItem->cart_id = $cart->id;
        $cartItem->dish_id = $dishId;
        $cartItem->save();

        $items = $cart->cartItems;

        return response()->json(['items' => $items]);
    }


}
