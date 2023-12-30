@extends('layouts.app')

@section('content')
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
      <div class="container-fluid">
        <a class="navbar-brand h1" href={{ route('products.index') }}>Products</a>
        <div class="justify-end">
          <div class="col">
            <a class="btn btn-sm btn-success" href={{ route('products.create') }}>Add Product</a>
          </div>
        </div>
      </div>
    </nav>

    <div class="container mt-5">
      <div class="row">
        @foreach ($products as $product)
          <div class="col-sm">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">{{ $product->name }}</h5>
              </div>
              <div class="card-body">
                <p class="card-text">{{ $product->description }}</p>
                <p class="card-text">Price: ${{ $product->price }}</p>
                @if ($product->image)
                  <img src="{{ asset('images/products/' . $product->image) }}" class="img-fluid" alt="Product Image">
                @endif
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                  </div>
                  <div class="col-sm">
                    <form action="{{ route('products.destroy', $product->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </body>
</html>
@endsection

