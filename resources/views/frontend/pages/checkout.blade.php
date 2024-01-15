@extends('frontend.layout.template')



@section('page-title')
<title>ECommerce Website</title>
@endsection


			@section('body-css')

			@endsection



			@section('body-content')


			<div role="main" class="main shop py-4">

				<div class="container">

				@if (App\Models\Cart::TotalItems() == 0)
					<div class="alert alert-info">
					Sorry! No Items are added in your cart. Please add some item to your cart first.
					</div>
				@else
					@if(!(Auth::check()))
					<div class="row">
						<div class="col">
							<p>Returning customer? <a href="{{route('userlogin')}}">Click here to login.</a></p>
						</div>
					</div>
					@endif
				

					<div class="row">
						<div class="col-lg-9">
						<form action="{{route('makePayment')}}"  method="POST" id="frmBillingAddress" class="needs-validation">
						@csrf
							<div class="accordion accordion-modern" id="accordion">
								<div class="card card-default">
									<div class="card-header">
										<h4 class="card-title m-0">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
												Billing Address
											</a>
										</h4>
									</div>
									<div id="collapseOne" class="collapse show">
										<div class="card-body">
											
										

												<div class="form-row">
													<div class="form-group col-lg-6">
														<label for="name" class="font-weight-bold text-dark text-2">Full Name</label>
														<input type="text" value="{{Auth::user()->name}}" name="name" id="name" class="form-control" required> 
														<!-- required removed from input type -->
														<div class="invalid-feedback">
															Customer name is required.
														</div>
													</div>
													<div class="form-group col-lg-6">
														<label class="font-weight-bold text-dark text-2">Email</label>
														<input type="email" value="{{Auth::user()->email}}" name="email" class="form-control" required>
													</div>
												</div>

												<div class="form-row">
													<div class="form-group col">
														<label class="font-weight-bold text-dark text-2">Phone No.</label>
														<input type="text" value="{{Auth::user()->phone}}" name="phone" class="form-control" required>
													</div>
												</div>
												<!-- Amount -->
												<input type="hidden" name="amount" value={{App\Models\Cart::TotalCartsAmount()}}>


												<div class="form-row">
													<div class="form-group col-lg-7">
														<label class="font-weight-bold text-dark text-2">Street</label>
														<input type="text" value="{{Auth::user()->address_line1}}" placeholder="Street" name="address_line1" class="form-control" required>
													</div>
													<div class="form-group col-lg-5">
														<label class="font-weight-bold text-dark text-2">City</label>
														<input type="text" value="{{Auth::user()->address_line2}}" placeholder="City" name="address_line2" class="form-control" required>
													</div>
												</div>

												<div class="form-row">
													<div class="form-group col-lg-5">
														<label class="font-weight-bold text-dark text-2">Division</label>
														<select  name="division_id" class="form-control" required>
														<option selected="" disabled>Please select your Division </option>
														@foreach ($divisions as $division)
														<option  value="{{$division->id}}"
															@if($division->id == Auth::user()->division_id)
															selected
															@endif>
														{{$division->name}} </option>
														@endforeach	
														</select>
														
													</div>
													<div class="form-group col-lg-5">
														<label class="font-weight-bold text-dark text-2">District</label>
														<select  name="district_id" class="form-control" required>
														<option selected="" disabled>Please select your District </option>
														@foreach ($districts as $district)
														<option  value= "{{$district->id}}"
														@if($district->id == Auth::user()->district_id)
															selected
															@endif
														> {{$district->name}}</option>
														@endforeach
														</select>

													</div>
													<div class="form-group col-lg-2">
														<label class="font-weight-bold text-dark text-2">Zip Code</label>
														<input type="text" value="{{Auth::user()->zipCode}}"  name="zipCode" class ="form-control" required>
													</div>
												</div>

												<div class="form-row">
													<div class="form-group col">
														<label class="font-weight-bold text-dark text-2">Country</label>
														<select type="text" name="country_name" class="form-control" required>
															<option selected="" value="Bangladesh" readonly>Bangladesh</option>
														</select>
														
													</div>
												</div>


												
									
												<div class="form-row">
													<div class="form-group col">
															<a class="btn btn-xl btn-light pr-4 pl-4 text-2 font-weight-semibold text-uppercase float-right mb-2" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Review &amp; Payment</a>
													</div>
												</div> 
											


										</div>
									</div>
								</div>

								<!-- Shipping Address -->
								<!-- <div class="card card-default">
									<div class="card-header">
										<h4 class="card-title m-0">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
												Shipping Address
											</a>
										</h4>
									</div>
									<div id="collapseTwo" class="collapse">
										<div class="card-body">
											<form action="/" id="frmShippingAddress" method="post">
												<div class="form-row">
													<div class="col">
														<div class="custom-control custom-checkbox pb-3">
															<input type="checkbox" class="custom-control-input" id="shipbillingaddress">
															<label class="custom-control-label" for="shipbillingaddress">Ship to billing address?</label>
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col">
														<label class="font-weight-bold text-dark text-2">Country</label>
														<select class="form-control">
															<option value="">Select a country</option>
														</select>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col-lg-6">
														<label class="font-weight-bold text-dark text-2">First Name</label>
														<input type="text" value="" class="form-control">
													</div>
													<div class="form-group col-lg-6">
														<label class="font-weight-bold text-dark text-2">Last Name</label>
														<input type="text" value="" class="form-control">
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col">
														<label class="font-weight-bold text-dark text-2">Company Name</label>
														<input type="text" value="" class="form-control">
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col">
														<label class="font-weight-bold text-dark text-2">Address </label>
														<input type="text" value="" class="form-control">
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col">
														<label class="font-weight-bold text-dark text-2">City </label>
														<input type="text" value="" class="form-control">
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col">
														<input type="submit" value="Continue" class="btn btn-xl btn-light pr-4 pl-4 text-2 font-weight-semibold text-uppercase float-right mb-2" data-loading-text="Loading...">
													</div>
												</div>
											</form>
										</div>
									</div>
								</div> -->
								<!-- Shipping Address  End-->

								<div class="card card-default">
									<div class="card-header">
										<h4 class="card-title m-0">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
												Review &amp; Payment
											</a>
										</h4>
									</div>
									<div id="collapseThree" class="collapse">
										<div class="card-body">
											<table class="shop_table cart">
												<thead>
													<tr>
														<th class="product-thumbnail">
															&nbsp;
														</th>
														<th class="product-name">
															Product
														</th>
														<th class="product-price">
															Price
														</th>
														<th class="product-quantity">
															Quantity
														</th>
														<th class="product-subtotal">
															Total
														</th>
													</tr>
												</thead>
												<tbody>
												@foreach(App\Models\Cart::TotalCarts() as $cart )
													<tr class="cart_table_item">
														<td class="product-thumbnail">
															<a href="shop-product-sidebar-left.html">
																<img width="100" height="100" alt="" class="img-fluid" src="{{asset('frontend/img/products/product-grey-1.jpg')}}">
															</a>
														</td>
														<td class="product-name">
															<a href="shop-product-sidebar-left.html">{{$cart->Product->title}}</a>
														</td>
														<td class="product-price">
																
																@if(!is_null($cart->Product->offer_price))
																		<span class="amount">{{$cart->Product->offer_price}} BDT</span>
																@else
																	   <span class="amount">{{$cart->Product->regular_price}} BDT</span>
																@endif

														</td>
														<td class="product-quantity">
														{{$cart->quantity}} Pcs
														</td>
														<td class="product-subtotal">
															<span class="amount">
																@if(!is_null($cart->Product->offer_price))
																		{{$cart->Product->offer_price * $cart->quantity}} BDT
																@else
																	  {{$cart->Product->regular_price * $cart->quantity}} BDT
																@endif
															</span>
														</td>
													</tr>
												@endforeach
												
													
												</tbody>
											</table>
							
											<hr class="solid my-5">
							
											<h4 class="text-primary">Cart Totals</h4>
											<table class="cart-totals">
												<tbody>
													<tr class="cart-subtotal">
														<th>
															<strong class="text-dark">Cart Subtotal</strong>
														</th>
														<td>
															<strong class="text-dark"><span class="amount">
															@if(App\Models\Cart::TotalCartsAmount() == 0)
															Sorry! No Items Added in Cart
															@else
															{{App\Models\Cart::TotalCartsAmount()}} BDT
															@endif
															</span>
															

															</span></strong>
														</td>
													</tr>
													<tr class="shipping">
														<th>
															Shipping
														</th>
														<td>
															Free Shipping<input type="hidden" value="free_shipping" id="shipping_method" name="shipping_method">
														</td>
													</tr>
													<tr class="total">
														<th>
															<strong class="text-dark">Order Total</strong>
														</th>
														<td>
															<strong class="text-dark"><span class="amount">{{App\Models\Cart::TotalCartsAmount()}} BDT</span></strong>
														</td>
													</tr>
												</tbody>
											</table>
							
											<hr class="solid my-5">
							
											<h4 class="text-primary">Payment</h4>
							
											
												<div class="form-row">
													<div class="form-group col">
														<div class="custom-control custom-checkbox">
															<input type="checkbox" class="custom-control-input" id="paymentdirectbank">
															<label class="custom-control-label" for="paymentdirectbank">Direct Bank Transfer</label>
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col">
														<div class="custom-control custom-checkbox">
															<input type="checkbox" class="custom-control-input" id="paymentcheque">
															<label class="custom-control-label" for="paymentcheque">Cheque Payment</label>
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col">
														<div class="custom-control custom-checkbox">
															<input type="checkbox" class="custom-control-input" id="paymentpaypal">
															<label class="custom-control-label" for="paymentpaypal">Paypal</label>
														</div>
													</div>
												</div>
											
										</div>
									</div>
								</div>
							</div>
							
							<div class="actions-continue">
								<input type="submit" value="Place Order" name="proceed" class="btn btn-primary btn-modern text-uppercase mt-5 mb-5 mb-lg-0">
							</div>
					
						</form>
						</div>

						<!-- End Chechout Form -->


						<div class="col-lg-3">
							<h4 class="text-primary">Cart Totals</h4>
							<table class="cart-totals">
								<tbody>
									<tr class="cart-subtotal">
										<th>
											<strong class="text-dark">Cart Subtotal</strong>
										</th>
										<td>
											<strong class="text-dark"><span class="amount">
											@if(App\Models\Cart::TotalCartsAmount() == 0)
											Sorry! No Items Added in Cart
											@else
											{{App\Models\Cart::TotalCartsAmount()}} BDT
											@endif
											</span></strong>
										</td>
									</tr>
									<tr class="shipping">
										<th>
											Shipping
										</th>
										<td>
											Free Shipping<input type="hidden" value="free_shipping" id="shipping_method" name="shipping_method">
										</td>
									</tr>
									<tr class="total">
										<th>
											<strong class="text-dark">Order Total</strong>
										</th>
										<td>
											<strong class="text-dark"><span class="amount">{{App\Models\Cart::TotalCartsAmount()}} BDT</span></strong>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					@endif
				</div>

			</div>

			@endsection

@section('body-script')
@endsection


		
	