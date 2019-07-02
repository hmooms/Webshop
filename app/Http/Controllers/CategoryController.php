<?php

namespace VRSense\Http\Controllers;

use VRSense\product;
use VRSense\category;


class CategoryController extends Controller
{
    // this shows the list of games per category
    // it takes the id of the category from the url
    public function show($id)
    {
        // these are the categories that will be shown in the navbar
        $categories = category::all();
        // these are the products that are of the category of the id it got from the url
        // it paginates 24 per page
        $products = product::where('category_id', $id)->paginate(24);

        // this shows the view with the before made variables 
        return view('store.home')->with('categories', $categories)->with('products', $products);
    }
}
