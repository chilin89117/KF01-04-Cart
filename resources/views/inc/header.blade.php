<header class="header" id="site-header">
  <div class="container">
    <div class="header-content-wrapper">
      <ul class="nav-add">
        <li class="cart">

          <a href="#" class="js-cart-animate">
            <i class="seoicon-basket"></i>
            <span class="cart-count">{{Cart::content()->count()}}</span>
          </a>

          <div class="cart-popup-wrap">
            <div class="popup-cart">
              <h5 class="title-cart">Items: {{Cart::content()->count()}}</h5>
              <h5 class="title-cart">Total: ${{Cart::total(2, '.', '.')}}</p>
              <a href="{{route('cart.show')}}" class="btn btn-small btn--dark">
                <span class="text">Go to Cart</span>
              </a>
            </div>
          </div>

        </li>
      </ul>
    </div>
  </div>
</header>

<div class="container">
  <div class="row pt80">
    <div class="col-lg-8 col-lg-offset-2">
      <div class="heading align-center">
        <p class="h1 heading-title">
          <a href="{{route('products.index')}}">{{config('app.storename1')}}</a>
        </p>
        <p class="heading-text">{{config('app.storename2')}}</p>
      </div>
    </div>
  </div>
</div>
