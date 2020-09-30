<?php

namespace VRSense\Http\Controllers;

use VRSense\order_details;
use VRSense\cart;
use Auth;
use VRSense\order;
use VRSense\category;

class OrderDetailsController extends Controller
{
    // shows all the made orders by this user
    public function index()
    {
        // check is user is logged in and if so gives the order details to the variable 
        $orders = (Auth::User())? Auth::User()->order_details : null;

        $categories = category::all();

        // shows the view with the orders variable
        return view('orders.overview')->with('orders', $orders)->with('categories', $categories);
    }

    // buy the products and stores the order into the database
    public function store()
    {
        // instantiate cart
        $cart = new cart;

        // instantiate new order_details
        $orderDetails = new order_details;
        // sets the user_id
        $orderDetails->user_id = (Auth::User())? Auth::User()->id : null;
        // sets the total_price
        $orderDetails->total_price = $cart->calculateTotalPrice();
        // inserts the above given variables into the database
        $orderDetails->save();

        // for every item in the cart we will put it in the database
        foreach ($cart->items as $item){
            // instantiate new order
            $order = new order;
            // set the quantity
            $order->quantity = $item['quantity'];
            // set the price we take the the current item in the loop take the product's price and multiply that by the amount of products
            $order->price = $item['product']->price * $item['quantity'];
            // set the foreign order_details_id
            $order->order_details_id = $orderDetails->id;
            // set the foreign product_id
            $order->product_id = $item['product']->id;
            // instert it all in the database
            $order->save();
        }
        // a method in the cart object to clear the cart after buying.
        $cart->emptyCart(); 
        
        // redirect to main page
        return redirect('/store');
    }

    // show the order with the given id
    public function show($id)
    {
        // get the orderdetails with this id 
        $orderDetails = order_details::find($id);

        $categories = category::all();

        // check if the order is actuall from the user so you wont see someone else's order when you dont have an order with this id
        if ($orderDetails['user_id'] == Auth::User()->id && $orderDetails != null){
            // show order with the details
            return view('orders.show')->with('orderDetails', $orderDetails)->with('categories', $categories);
        }
        // if there is no order with that id return to store
        else {
            return redirect('/store');
        }
    }

}
