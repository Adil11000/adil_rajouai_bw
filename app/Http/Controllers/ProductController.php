<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Haal alle producten op uit de database

        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string',
            'product_price' => 'required|numeric',
            'product_image' => 'required|url',
        ]);

        Product::create([
            'name' => $request->input('product_name'),
            'price' => $request->input('product_price'),
            'image_url' => $request->input('product_image'),
        ]);

        return redirect()->route('products.create')->with('success', 'Product created successfully!');
    }
}
