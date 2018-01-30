@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row bg-border-color medium-padding40">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="order">
						<h2 class="order-title align-center">Your Order</h2>
						<form action="#" method="post" class="cart-main">
							<table class="shop_table cart">
								<thead class="cart-product-wrap-title-main">
									<tr>
										<th width="50%" class="product-thumbnail">Product</th>
										<th width="10%" align="right" class="product-quantity">Quantity</th>
										<th width="10%"></th>
										<th width="20%" align="right" class="product-subtotal">Total</th>
										<th width="10%"></th>
									</tr>
								</thead>

								<tbody>
									@foreach(Cart::content() as $item)
									<tr class="cart_item">
										<td class="product-thumbnail">
											<div class="cart-product__item">
												<div class="cart-product-content">
													<h5 class="cart-product-title">{{$item->model->name}}</h5>
												</div>
											</div>
										</td>

										<td align="right" class="product-quantity">
											<div class="quantity">{{$item->qty}}</div>
										</td>
										<td></td>

										<td align="right" class="product-subtotal">
											<h5 class="total amount">${{$item->subtotal(2, '.', ',')}}</h5>
										</td>
										<td></td>
									</tr>
									@endforeach

									<tr class="cart_item subtotal">
										<td class="product-thumbnail">
											<div class="cart-product-content">
												<h5 class="cart-product-title">Subtotal:</h5>
											</div>
										</td>

										<td class="product-quantity"></td>
										<td></td>

										<td class="product-subtotal">
											<h5 class="total amount">${{Cart::subtotal(2, '.', ',')}}</h5>
										</td>
										<td></td>
									</tr>

									<tr class="cart_item total">
										<td class="product-thumbnail">
											<div class="cart-product-content">
												<h5 class="cart-product-title">Total with Tax:</h5>
											</div>
										</td>

										<td class="product-quantity"></td>
										<td></td>

										<td class="product-subtotal">
											<h5 class="total amount">${{Cart::total(2, '.', ',')}}</h5>
										</td>
										<td></td>
									</tr>
								</tbody>
							</table>

							<div class="cheque">
								<div class="logos">
									<a href="#" class="logos-item">
										<img src="{{asset('app/img/visa.png')}}" alt="Visa">
									</a>
									<a href="#" class="logos-item">
										<img src="{{asset('app/img/mastercard.png')}}" alt="MasterCard">
									</a>
									<a href="#" class="logos-item">
										<img src="{{asset('app/img/discover.png')}}" alt="DISCOVER">
									</a>
									<a href="#" class="logos-item">
										<img src="{{asset('app/img/amex.png')}}" alt="Amex">
									</a>

									<span class="align-center">
										<form action="{{route('cart.pay')}}" method="POST">
											{{csrf_field()}}
  										<script
    										src="https://checkout.stripe.com/checkout.js"
												class="stripe-button"
    										data-key="pk_test_4HFmAgExqyhJ1JrPqlPzOUgc"
    										data-amount={{Cart::total()}}
    										data-name={{config('app.storename1')}}
    										data-description={{config('app.storename2')}}
    										data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    										data-locale="auto">
  										</script>
										</form>
									</span>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
