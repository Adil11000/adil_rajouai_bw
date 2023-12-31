@extends('layouts.app')

@section('content')
<div class="container h-100 mt-5">
@auth
  <div class="row h-100 justify-content-center align-items-center">
    <div class="col-10 col-md-8 col-lg-6">
      <h3>Update ad</h3>
      <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" id="description" name="description" rows="3" required>{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
          <label for="price">Price</label>
          <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
        </div>
        <div class="form-group">
          <label for="image">Image</label>
          <input id="image" type="file" class="form-control-file"  name="image">
        </div>
        <button type="submit" class="btn mt-3 btn-primary">Update ad</button>
      </form>
    </div>
  </div>
  @endauth
</div>
@endsection

