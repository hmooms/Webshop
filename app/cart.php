<?php

namespace VRSense;

use Illuminate\Support\Facades\Session;

class cart 
{
    const CART = '_cart';
    public $items = [];

    // the constructor
    function __construct()
    {
        $cartItems = (cart::exist())?Session::get(self::CART) :null;

        $this->items = $cartItems;
    }

    // add item(s) to the cart
    public function addToCart($id, $qty)
    {
        $product = product::find($id);
        $storedItem = ['quantity' => 0, 'item' => $product];
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['quantity'] += $qty;
        $this->items[$id] = $storedItem;

        cart::updateSession($this->items);
    }


    public function removeFromCart($id, $qty)
    {
        $this->items[$id]['quantity'] -= $qty;

        if($this->items[$id]['quantity'] <= 0){
            unset($this->items[$id]);
        }

        cart::updateSession($this->items);
    }


    public function emptyCart()
    {
        $this->items = [];
        cart::updateSession($this->items);
    }

    public function calculateTotalPrice()
    {
        $total = 0;
        $items = Session::get(self::CART);
        foreach ($items as $item) {
            $total += $item['item']->price * $item['quantity'];
        }

        return $total;
    }

    // checks if there is an existing cart
    private static function exist()
    {
        $response = (Session::has(self::CART))?true :false;
        return $response;
    }

    // put the new data in the sessions
    private static function updateSession($items)
    {
        Session::put(self::CART, $items);
    }
}
