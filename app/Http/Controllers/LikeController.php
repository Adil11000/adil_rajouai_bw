<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Product;
use App\Models\User;

class LikeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $productId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $productId)
    {
        // Check if the user has already liked the product
        $existingLike = Like::where('user_id', auth()->id())
            ->where('product_id', $productId)
            ->first();

        if ($existingLike) {
            return redirect()->back()->with('error', 'You have already liked this product.');
        }

        // Create a new like
        Like::create([
            'user_id' => auth()->id(),
            'product_id' => $productId,
        ]);

        return redirect()->back()->with('success', 'Product liked successfully.');
    }
}