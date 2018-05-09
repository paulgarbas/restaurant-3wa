<?php

namespace App\Http\Controllers;

use App\ShoppingCart;
use App\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    public function addToCart(Request $request) {
        $id = $request->input('id');
        $dish = Dish::findOrFail($id);
        $oldCart = (Session::has('cart')) ? Session::get('cart') : null;

        $shoppingCart = new ShoppingCart($oldCart);
        $shoppingCart->add($dish);

        $request->session()->put('cart', $shoppingCart);

        return redirect()->back();
    }

    public function index() {
        $cart = (Session::has('cart')) ? Session::get('cart') : null;
        return view('cart.index', compact('cart'));
    }

    public function destroy(Request $request) {
        $id = $request->input('id');
        $oldCart = (Session::has('cart')) ? Session::get('cart') : null;
        $shoppingCart = new ShoppingCart($oldCart);
        $shoppingCart->removeDish($id);

        $request->session()->put('cart', $shoppingCart);

        return redirect()->back();

    }

    public function deleteByOne(Request $request) {
        $id = $request->input('id');
        $oldCart = (Session::has('cart')) ? Session::get('cart') : null;
        $shoppingCart = new ShoppingCart($oldCart);
        $shoppingCart->removeByOne($id);

        $request->session()->put('cart', $shoppingCart);

        return redirect()->back();
    }
}
