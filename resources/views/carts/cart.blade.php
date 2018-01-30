@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row bg-border-color medium-padding40">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="cart">
            <h2 class="cart-title">In Your Shopping Cart:
              <span class="c-primary">{{Cart::content()->count()}} {{Cart::content()->count()==1?'product':'products'}}</span>
            </h2>
          </div>

          <form action="#" method="post" class="cart-main">
            <table class="shop_table cart">
              <thead class="cart-product-wrap-title-main">
                <tr>
                  <th width="5%" class="product-remove">&nbsp;</th>
                  <th width="45%" class="product-thumbnail">Thumbnail</th>
                  <th width="10%" class="product-price">price</th>
                  <th width="5%"></th>
                  <th width="25%" class="product-quantity">qty</th>
                  <th width="10%" class="product-subtotal">subtotal</th>
                </tr>
              </thead>

              <tbody>
                @foreach(Cart::content() as $item)
                <tr class="cart_item">
                  <td class="product-remove">
                    <a href="{{route('cart.remove_item', $item->rowId)}}" class="product-del remove" title="Remove this item">
                      <i class="seoicon-delete-bold"></i>
                    </a>
                  </td>

                  <td class="product-thumbnail">
                    <div class="cart-product__item">
                      <a href="#">
                        <img src="{{asset('storage/products/'.$item->model->image)}}"
                             width="100" height="100" alt="product-image"
                             class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
                      </a>
                      <div class="cart-product-content">
                        <h5 class="cart-product-title">{{$item->model->name}}</h5>
                      </div>
                    </div>
                  </td>

                  <td align="right" class="product-price">
                    <h5 class="price amount">${{number_format($item->price, 2)}}</h5>
                  </td>

                  <td></td>

                  <td align="right" class="product-quantity">
                    <div class="quantity">
                      <a href="{{route('cart.minusOne', $item->rowId)}}" class="quantity-minus">-</a>
                      <input title="Qty" class="email input-text qty text" type="text"
                             value="{{$item->qty}}" readonly>
                      <a href="{{route('cart.plusOne', $item->rowId)}}" class="quantity-plus">+</a>
                    </div>
                  </td>

                  <td align="right" class="product-subtotal">
                    <h5 class="total amount">${{$item->subtotal(2, '.', ',')}}</h5>
                  </td>
                </tr>
                @endforeach
                <tr>
                  <td colspan="6" class="actions">
                    <div class="coupon">
                      <input name="coupon_code" class="email input-standard-grey" value="" placeholder="Coupon code" type="text">
                      <div class="btn btn-medium btn--breez btn-hover-shadow">
                        <span class="text">Apply Coupon</span>
                        <span class="semicircle--right"></span>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </form>

          <div class="cart-total">
            <h3 class="cart-total-title">Cart Totals</h3>
            <h5 class="cart-total-total">Total with Tax:
              <span class="price">${{Cart::total(2, '.' , ',')}}</span>
            </h5>
            <a href="{{route('cart.checkout')}}" class="btn btn-medium btn--light-green btn-hover-shadow">
              <span class="text">Checkout</span>
              <span class="semicircle"></span>
            </a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
