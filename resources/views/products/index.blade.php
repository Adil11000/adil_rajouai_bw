@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create a New Product</h2>
        <form method="POST" action="{{ route('products.store') }}">
            @csrf

            <!-- Product name -->
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" required>
            </div>

            <!-- Product price -->
            <div class="mb-3">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" class="form-control" id="product_price" name="product_price" required>
            </div>

            <!-- Product image URL -->
            <div class="mb-3">
                <label for="product_image" class="form-label">Product Image URL</label>
                <input type="text" class="form-control" id="product_image" name="product_image" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Product</button>
        </form>
    </div>
@endsection
