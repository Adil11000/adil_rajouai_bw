<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    
    public function index()
{
    $products = Product::all();

    foreach ($products as $product) {
        $product->image = asset('storage/images/' . $product->image);

    }
    

    return view('products.index', compact('products'));
}



    
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image upload
        ]);

        $productData = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ];

        // Check if an image is uploaded
        if ($request->hasFile('image')) {
            $newImage = $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImage);

            // Add image to product data
            $productData['image'] = $newImage;
        }

        Product::create($productData);
        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|max:255',
        'description' => 'required',
        'price' => 'required|numeric',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image upload
    ]);

    $product = Product::find($id);

    $productData = [
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'price' => $request->input('price'),
    ];

    // Update avatar als er een is geüpload
    if ($request->hasFile('image')) {

        $newImage = $request->file('image')->store('public/images');
        $productData['image'] = basename($newImage);
    }

    $product->update($productData);

    return redirect()->route('products.index')->with('success', 'Product updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        $product = Product::find($product);

        $this->authorize('delete', $product);
        $product->likes()->delete();


        // Delete the product's image if it exists
        if ($product->image) {
            $imagePath = public_path('images') . '/' . $product->image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }



    /**
     * Show the form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    public function edit($id)
  {
    
    $product = Product::find($id);
    return view('products.edit', compact('product'));
  }
}
