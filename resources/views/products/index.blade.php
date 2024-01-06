@extends('layouts.app')

@section('content')
<body>
@auth
  
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand h1" href="{{ route('products.index') }}"></a>
            <div class="justify-end">
                <div class="col">
                @can('create', App\Models\Product::class)
                    <a class="btn btn-sm btn-success" href="{{ route('products.create') }}">Add Product</a>
                    @endcan
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-sm mb-4">
                    <div class="card">
                      
                        <div class="card-body">

                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}'s Image">
                            <p class="card-text">{{ $product->name }}</p>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text">Price: ${{ $product->price }}</p>
                            <p class="card-text">Published on: {{ $product->created_at->format('Y-m-d H:i:s') }}</p>
                           
                            <div>

                            <!-- Knoppen weergeven op basis van gebruikersrol -->
                            @can('delete', $product)
                                <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            @endcan
                            </div>
                            <div>

                            @can('edit', $product)
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            @endcan
                            </div>
                            <div>

                            <form action="{{ route('products.like', $product->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Like</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endauth
</body>
</html>
@endsection
