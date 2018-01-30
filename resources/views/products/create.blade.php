@extends('layouts.app')

@section('content')
<div class="panel panel-primary">
  <div class="panel-heading">
    <div class="panel-title">Add a Product
      <span class="pull-right">
        <a href="{{route('products.index')}}" class="btn btn-default btn-xs">
          <i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back
        </a>
      </span>
    </div>
  </div>

  <div class="panel-body">
    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}

      <div class="form-group">
        <label for="name">Product Name</label>
        <input type="text" name="name" class="form-control" value="{{old('name')}}">
      </div>

      <div class="form-group">
        <label for="price">Product Price</label>
        <input type="text" name="price" class="form-control" value="{{old('price')}}">
      </div>

      <div class="form-group">
        <label for="image">Product Image</label>
        <input type="file" name="image" accept="image/*">
      </div>

      <div class="form-group">
        <label for="description">Product Description</label>
        <textarea name="description" rows="6" class="form-control">{{old('description')}}</textarea>
      </div>

      <button type="submit" name="button" class="btn btn-success">
        <i class="fa fa-database"></i>&nbsp;&nbsp;Add Product</button>

    </form>
  </div>
</div>
@endsection
