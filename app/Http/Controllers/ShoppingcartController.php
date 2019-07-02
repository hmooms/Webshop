<?php

namespace VRSense\Http\Controllers;

use Illuminate\Http\Request;
use VRSense\cart;
use VRSense\category;

class ShoppingcartController extends Controller
{
    // show the cart
    public function index()
    {
        // instantiate cart
        $cart = new cart;
        // get all the categories for the navbar
        $categories = category::all();

        // show the view with the above made variables
        return view('cart.index')->with('cart', $cart)->with('categories', $categories);
    }

    // add the product to the cart
    // the request will have a product id and a quantity 
    public function addToCart(Request $request)
    {
        // set the id
        $id = $request->id;
        // set the quantity
        $qty = $request->qty;

        // instantiate cart
        $cart = new cart;
        // use the addToCart method from the cart class with the parameters?/arguments? id and qty
        $cart->addToCart($id, $qty);
        
        // then redirect to shoppingcart 
        return redirect()->route('shoppingcart');

    }

    // remove from the cart
    // the request will have a product id and a quantity 
    public function removeFromCart(Request $request)
    {
        // set the id
        $id = $request->id;
        // set the quantity
        $qty = $request->qty;

        // instantiate cart
        $cart = new cart;
        // use the removeFromCart method from the cart class with the parameters?/arguments? id and qty
        $cart->removeFromCart($id, $qty);

        // go back to page where you pressed removeFromCart
        return back();
    }
}
