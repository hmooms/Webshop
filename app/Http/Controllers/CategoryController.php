<?php

namespace VRSense\Http\Controllers;

use VRSense\product;
use VRSense\category;


class CategoryController extends Controller
{
    public function show($id)
    {
        $categories = category::all();
        $products = product::where('category_id', $id)->paginate(24);

        return view('store.home')->with('categories', $categories)->with('products', $products);
    }
}
