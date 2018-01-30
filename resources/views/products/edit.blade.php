@extends('layouts.app')

@section('content')
<div class="panel panel-primary">
  <div class="panel-heading">
    <div class="panel-title">Editing: {{$product->name}}
      <span class="pull-right">
        <a href="{{route('products.index')}}" class="btn btn-default btn-xs">
          <i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back
        </a>
      </span>
    </div>
  </div>

  <div class="panel-body">
    <form action="{{route('products.update', $product)}}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      {{method_field('put')}}

      <div class="form-group">
        <label for="name">Product Name</label>
        <input type="text" name="name" class="form-control" value="{{$product->name}}">
      </div>

      <div class="form-group">
        <label for="price">Product Price</label>
        <input type="text" name="price" class="form-control" value="{{$product->price}}">
      </div>

      <div class="form-group">
        <label for="image">Product Image</label>
        <input type="file" name="image" accept="image/*">
      </div>

      <div class="form-group">
        <label for="description">Product Description</label>
        <textarea name="description" rows="6" class="form-control">{{$product->description}}</textarea>
      </div>

      <button type="submit" name="button" class="btn btn-success">
        <i class="fa fa-database"></i>&nbsp;&nbsp;Update Product</button>

    </form>
  </div>
</div>
@endsection
