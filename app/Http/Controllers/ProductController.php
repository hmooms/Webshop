<?php

namespace VRSense\Http\Controllers;

use Illuminate\Support\Facades\DB;
use VRSense\product;
use Illuminate\Http\Request;
use VRSense\category;

class ProductController extends Controller
{
    // show the store main page
    public function index()
    {
        // get all the products
        $products = product::paginate(24);
        // get all the categories for the navbar
        $categories = category::all();
        
        // show the store view with the above made variables
        return view('store.home')->with('products', $products)->with('categories', $categories);
    }

    // show the product with this id
    public function show($id)
    {
        // get the product with this id
        $product = product::find($id);
        // get all the categories for the navbar
        $categories = category::all();

        // show the view with the above made variables
        return view('store.show')->with('product', $product)->with('categories', $categories);
    }
}
