@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row medium-padding80">
    <div class="product-details">
      <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
        <div class="product-details-thumb">
          <div class="swiper-container" data-effect="fade">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
              <div class="product-details-img-wrap swiper-slide">
                <img src="{{asset('storage/products/'.$product->image)}}"
                     width="300" height="300" alt="product" data-swiper-parallax="-10">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-lg-offset-1 col-md-6 col-md-offset-1 col-sm-6 col-sm-offset-1 col-xs-12 col-xs-offset-0">
        <div class="product-details-info">
          <div class="product-details-info-price">${{number_format($product->price, 2)}}</div>
          <h3 class="product-details-info-title">{{$product->name}}</h3>
          <p class="product-details-info-text">{{$product->description}}</p>
          <form action="{{route('cart.add', $product)}}" method="post">
            {{csrf_field()}}
            <!-- 'quantity-plus/minus' are CSS classes used in 'show' and 'cart' pages -->
            <!-- 'minus-one' is used here only for 'main.js' to +/- 1 -->
            <div class="quantity">
              <a href="#" class="quantity-minus minus-one">-</a>
              <input title="Qty" class="email input-text qty text" name="qty" type="text" value="1">
              <a href="#" class="quantity-plus plus-one">+</a>
            </div>
            <button type="submit" class="btn btn-medium btn--primary">
              <span class="text">Add to Cart</span>
              <i class="seoicon-commerce"></i>
              <span class="semicircle"></span>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
