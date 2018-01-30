@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="books-grid">
      <div class="row">
        <div class="col-lg-12">
          {{$products->links()}}
        </div>
      </div>

      <div class="row mb30">
        @foreach($products as $prod)
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="books-item">
            <div class="books-item-thumb">
              <img src="{{asset('storage/products/'.$prod->image)}}"
                   width="150" height="150" alt="{{$prod->name}}">
              <div class="new">New</div>
              <div class="sale">Sale</div>
              <div class="overlay overlay-books"></div>
            </div>

            <div class="books-item-info">
              <a href="{{route('products.show', $prod)}}">
                <h6 class="books-title">{{title_case($prod->name)}}</h6>
              </a>
              <div class="books-price">${{number_format($prod->price,2)}}</div>
            </div>

            <form action="{{route('cart.add', $prod)}}" method="post">
              {{csrf_field()}}
              <input type="hidden" name="qty" value="1">
              <button type="submit" name="button" class="btn btn-small btn--dark add">
                <span class="text">Add to Cart</span>
                <i class="seoicon-commerce"></i>
              </button>
            </form>
          </div>
        </div>
        @endforeach
      </div>

      <div class="row">
        <div class="col-lg-12">
          {{$products->links()}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
