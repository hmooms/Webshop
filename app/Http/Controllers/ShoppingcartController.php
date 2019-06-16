<?php

namespace VRSense\Http\Controllers;

use Illuminate\Http\Request;
use VRSense\cart;
use VRSense\category;
use Symfony\Component\VarDumper\VarDumper;

class ShoppingcartController extends Controller
{
    public function index()
    {
        $cart = new cart;
        $categories = category::all();

        return view('cart.index')->with('cart', $cart)->with('categories', $categories);
    }


    public function addToCart(Request $request)
    {
        $id = $request->id;
        $qty = $request->qty;

        $cart = new cart;
        $cart->addToCart($id, $qty);
        
        return redirect()->route('shoppingcart');

    }


    public function removeFromCart(Request $request)
    {
        $id = $request->id;
        $qty = $request->qty;

        $cart = new cart;
        $cart->removeFromCart($id, $qty);

        return back();
    }
}
