<?php

namespace VRSense\Http\Controllers;

use Illuminate\Support\Facades\DB;
use VRSense\product;
use Illuminate\Http\Request;
use VRSense\category;

class ProductController extends Controller
{
    public function index()
    {
        $products = product::paginate(24);
        $categories = category::all();
        return view('store.home')->with('products', $products)->with('categories', $categories);
    }

    public function show($id)
    {
        $product = product::find($id);
        $categories = category::all();
        return view('store.show')->with('product', $product)->with('categories', $categories);
    }
}
