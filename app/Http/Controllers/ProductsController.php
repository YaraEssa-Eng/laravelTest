<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Categories;
use App\Models\Products;
use Exception;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products_with_categories = Products::with('categories')->get();
        // return $products_with_categories;

        return  view('admins.products.index', compact('products_with_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();
        return  View('admins.products.create', compact( 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
          // return $request;

          try {

            $product = Products::create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $request->image,
                'cat_id' => $request->resoureceName,                
            ]);

            return back()->with('success', 'The Product has inserted successfully');
        } catch (Exception $e) {

            return back()->withErrors(['error' => 'something happend']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $products)
    {
        //
    }
}
