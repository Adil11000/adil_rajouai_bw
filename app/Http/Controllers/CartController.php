<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;


class CartController extends Controller

{

    public function addToCart(Request $request, Product $product)
    {
        // Voeg het product toe aan de winkelwagen
        Cart::create([
            'product_id' => $product->id,
            'user_id' => auth()->id(), // Je kunt dit aanpassen afhankelijk van je gebruikerssysteem
        ]);

        return redirect()->back()->with('success', 'Product is toegevoegd aan de winkelwagen.');
    }

    public function showCart()
{
    $user = auth()->user();

    // Haal alle gelikete producten van de huidige gebruiker op
    $likedProducts = $user->likes->map(function ($like) {
        return $like->product;
    });

    return view('cart.my-cart', compact('likedProducts'));
}
}


