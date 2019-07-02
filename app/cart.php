<?php

namespace VRSense;

use Illuminate\Support\Facades\Session;

class cart 
{
    // make constant cart
    const CART = '_cart';
    // make items array
    public $items = [];

    // the constructor
    function __construct()
    {
        // check if there is a cart the session and gets the items else adds nothing
        $cartItems = (cart::exist())?Session::get(self::CART) :null;

        // sets the items in the cart
        $this->items = $cartItems;
    }

    // add item(s) to the cart
    public function addToCart($id, $qty)
    {
        // find the product with this id
        $product = product::find($id);
        // store the product in an array, the quantity will be added later
        $storedItem = ['quantity' => 0, 'product' => $product];
        // check if it has items
        if($this->items){
            // check if the product is already added to the cart
            if(array_key_exists($id, $this->items)){
                // if so so change to the already existing product
                $storedItem = $this->items[$id];
            }
        }
        // add the quantity
        $storedItem['quantity'] += $qty;
        // put the array in the cart
        $this->items[$id] = $storedItem;

        // update the cart with the new items
        cart::updateSession($this->items);
    }

    // delete item(s) from the cart
    public function removeFromCart($id, $qty)
    {
        // update the quantity from items with id in cart
        $this->items[$id]['quantity'] -= $qty;

        // check if item quantity is 0 and ifso remove this item
        if($this->items[$id]['quantity'] <= 0){
            unset($this->items[$id]);
        }

        // update the cart
        cart::updateSession($this->items);
    }

    // empty the cart
    public function emptyCart()
    {
        // set cart items to nothing
        $this->items = [];

        // update the cart
        cart::updateSession($this->items);
    }

    // calculate the total price of the items in the cart
    public function calculateTotalPrice()
    {   
        // start at 0
        $total = 0;
        // get the items from the cart
        $items = Session::get(self::CART);

        // for every item take the product price and multiply by quantity
        // add that to the total 
        foreach ($items as $item) {
            $total += $item['product']->price * $item['quantity'];
        }

        // return the total
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
