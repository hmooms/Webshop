<?php

namespace VRSense\Http\Controllers;

use Illuminate\Support\Facades\DB;
use VRSense\product;
use Illuminate\Http\Request;
use VRSense\category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::paginate(24);
        $categories = category::all();
        return view('store.home')->with('products', $products)->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \VRSense\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = product::find($id);
        $categories = category::all();
        return view('store.show')->with('product', $product)->with('categories', $categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \VRSense\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \VRSense\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \VRSense\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }
}
