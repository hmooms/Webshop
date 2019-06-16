<?php

namespace VRSense\Http\Controllers;

use VRSense\order_details;
use Illuminate\Http\Request;
use VRSense\cart;
use Auth;
use VRSense\order;

class OrderDetailsController extends Controller
{
    public function index(Request $request)
    {
        $orders = (Auth::User())? Auth::User()->order_details : null;

        return view('orders.overview')->with('orders', $orders);
    }


    public function store()
    {
        $cart = new cart;

        $order = new order_details;
        $order->user_id = Auth::User()->id;
        $order->total_price = $cart->calculateTotalPrice();
        $order->save();

        foreach ($cart->items as $item){
            $orderDetails = new order;
            $orderDetails->quantity = $item['quantity'];
            $orderDetails->price = $item['item']->price * $item['quantity'];
            $orderDetails->order_details_id = $order->id;
            $orderDetails->product_id = $item['item']->id;
            $orderDetails->save();
        }

        $cart->emptyCart(); 
        
        return redirect('/store');
    }

   
    public function show($id)
    {
        $orderDetails = order_details::find($id);

        if ($orderDetails->user_id == Auth::User()->id){
            return view('orders.show')->with('orderDetails', $orderDetails);
        }
        else {
            return redirect()->back();
        }
    }

}
