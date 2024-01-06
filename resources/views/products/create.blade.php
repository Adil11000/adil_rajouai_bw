@extends('layouts.app')
@section('content')

<div class="container h-100 mt-5">
@auth
  <div class="row h-100 justify-content-center align-items-center">
    <div class="col-10 col-md-8 col-lg-6">
      <h3>Add a ad</h3>
      <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
          <label for="price">Price</label>
          <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
          <label for="image">Image</label>
          <input id="image" type="file" class="form-control-file" name="image">
        </div>
    
        <br>
        <button type="submit" class="btn btn-primary">Create ad</button>
      </form>
    </div>
  </div>
@endauth
</div>
@endsection
