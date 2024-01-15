@extends('frontend.layout.template')



@section('page-title')
<title>ECommerce Website</title>
@endsection


			@section('body-css')

			@endsection



			@section('body-content')
			
			
			<div role="main" class="main">

				<section class="page-header page-header-classic">
					<div class="container">
						<div class="row">
							<div class="col">
								<ul class="breadcrumb">
									<li><a href="#">Home</a></li>
									<li class="active">Pages</li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col p-static">
								<h1 data-title-border>Login</h1>

							</div>
						</div>
					</div>
				</section>

				<div class="container">

					<div class="row">
						<div class="col">

							<div class="featured-boxes">
								<div class="row">
									<div class="col-md-6">
										<div class="featured-box featured-box-primary text-left mt-5">
											<div class="box-content">
												<h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">I'm a Returning Customer</h4>
												 <!-- Session Status -->
												 <x-auth-session-status class="mb-4" :status="session('status')" />
												
												 <x-auth-validation-errors class="mb-4" :errors="$errors" />
												<!-- login form -->
												<form action="{{route('login')}}" id="frmSignIn" method="POST">
													@csrf
													<div class="form-row">
														<div class="form-group col">
															<label for="email" class="font-weight-bold text-dark text-2">E-mail Address</label>
															<input class="form-control form-control-lg" ype="email" class="form-control" id="email" name="email" placeholder="Email Address" required autofocus autocomplete="email" value="{{old('email')}}"> 
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col">
														@if (Route::has('password.request'))
															<a class="float-right" href="{{ route('password.request') }}">
															{{__('Forgot your password?') }}</a>
														@endif
															
															<label for="password" class="font-weight-bold text-dark text-2">Password</label>
															<input type="password" value="" class="form-control form-control-lg" id="password" name="password" placeholder="Enter Password"  required autocomplete="current-password">
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col-lg-6">
															<div class="custom-control custom-checkbox">
																<input type="checkbox" class="custom-control-input" id="rememberme">
																<label class="custom-control-label text-2" for="rememberme">Remember Me</label>
															</div>
														</div>
														<div class="form-group col-lg-6">
															<input type="submit" value="Login" class="btn btn-primary btn-modern float-right" data-loading-text="Loading...">
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="featured-box featured-box-primary text-left mt-5">
											<div class="box-content">
												<h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">Register An Account</h4>
												<!-- Error -->
												<x-auth-validation-errors class="mb-4" :errors="$errors" />
												
												<!-- Register -->
												<form action="{{route('register')}}" id="frmSignUp" method="POST" >
												
													@csrf
													<div class="form-row">
														<div class="form-group col-lg-6">
															<label for="name" class="font-weight-bold text-dark text-2">Full Name</label>
															<input  class="form-control form-control-lg"  type="text" name="name" id="name" placeholder="" value="{{old('name')}}" required autofocus>
														</div>

														<div class="form-group col-lg-6">
															<label for="email" class="font-weight-bold text-dark text-2">Email</label>
															<input type="email" id="email" placeholder="" name="email" value="{{old('email')}}" required autofocus autocomplete="email" class="form-control form-control-lg" >
														</div>

													</div>
													<div class="form-row">
														<div class="form-group col-lg-6">
															<label for="password" class="font-weight-bold text-dark text-2">Password</label>
															<input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="" required autocomplete="new-password">
														</div>

														<div class="form-group col-lg-6">
															<label for="password_confirmation" class="font-weight-bold text-dark text-2">Re-enter Password</label>
															<input type="password" class="form-control form-control-lg" id="password_confirmation" name="password_confirmation" placeholder="" required autocomplete="new-password">
														</div>
													</div>

													<div class="form-row">
														<div class="form-group col-lg-9">
															<div class="custom-control custom-checkbox">
																<input type="checkbox" class="custom-control-input" id="terms" checked>
																<label class="custom-control-label text-2" for="terms">I have read and agree to the <a href="#">terms of service</a></label>
															</div>
														</div>
														<div class="form-group col-lg-3">
															<input type="submit" value="Register" class="btn btn-primary btn-modern float-right" data-loading-text="Loading...">
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>

				</div>

			
			</div>
			@endsection

@section('body-script')
@endsection


	