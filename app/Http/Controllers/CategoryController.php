<?php

namespace VRSense\Http\Controllers;

use VRSense\product;
use VRSense\category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;


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
        $category = category::find($id);
        $products = $this->paginate($category->products);

        // this shows the view with the before made variables 
        return view('store.home')->with('categories', $categories)->with('products', $products);
    }

    public function paginate($products, $perPage = 24, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $products = $products instanceof Collection ? $products : Collection::make($products);
        return new LengthAwarePaginator($products->forPage($page, $perPage), $products->count(), $perPage, $page, $options);
    }
}
