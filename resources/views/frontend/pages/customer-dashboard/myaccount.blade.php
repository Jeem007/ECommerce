
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
									<li class="active">Profile</li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col p-static">
								<h1 data-title-border>Profile - {{ Auth::user()->name }}</h1>

							</div>
						</div>
					</div>
				</section>

				<div class="container py-2">


				<!-- start -->
				<form action = "{{route('Customer_Dashboard.Update', Auth::user()->id)}}" method="post" role="form" class="needs-validation" enctype="multipart/form-data">
				@csrf
					<div class="row">
						<div class="col-lg-3 mt-4 mt-lg-0">

							<div class="d-flex justify-content-center mb-4">
								<div class="profile-image-outer-container">
									<div class="profile-image-inner-container bg-color-primary">
										@if(!is_null(Auth::user()->image))
										<img src="{{asset('images/user/' .Auth::user()->image)}}">
										@else
										<img src ="{{asset('images/user/user.jpg')}}">
										
										@endif
										<span class="profile-image-button bg-color-dark">
											<i class="fas fa-camera text-light"></i>
										</span>
									</div>
									<input type="file"  name="image" id="file"  class="profile-image-input">
								</div>
							</div>

							<aside class="sidebar mt-2" id="sidebar">
								<ul class="nav nav-list flex-column mb-5">
									<li class="nav-item"><a class="nav-link text-dark active" href="#">My Profile</a></li>
									<li class="nav-item"><a class="nav-link" href="#">User Preferences</a></li>
									<li class="nav-item"><a class="nav-link" href="#">Billing</a></li>
									<li class="nav-item"><a class="nav-link" href="#">Invoices</a></li>
								</ul>
							</aside>

						</div>
						<div class="col-lg-9">

							<div class="overflow-hidden mb-1">
								<h2 class="font-weight-normal text-7 mb-0"><strong class="font-weight-extra-bold">My</strong> Profile</h2>
							</div>
							<div class="overflow-hidden mb-4 pb-3">
								
							</div>

							
							    <div class="form-group row">
							        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Full name</label>
							        <div class="col-lg-9">
							            <input class="form-control" required name="name" type="text" value="{{Auth::user()->name}}">
							        </div>
							    </div>
							    
							    <div class="form-group row">
							        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Email</label>
							        <div class="col-lg-9">
							            <input class="form-control" required readonly type="email" name="email" value="{{Auth::user()->email}}">
							        </div>
							    </div>
							    <div class="form-group row">
							        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Phone</label>
							        <div class="col-lg-9">
							            <input class="form-control" type="text" name="phone" value="{{Auth::user()->phone}}">
							        </div>
							    </div>

							    <div class="form-group row">
							        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Address</label>
							        <div class="col-lg-9">
							            <input class="form-control" type="text" required name="address_line1" value="{{Auth::user()->address_line1}}" placeholder="Street">
							        </div>
							    </div>
							    <div class="form-group row">
							        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2"></label>
							        <div class="col-lg-6">
							            <input class="form-control" type="text" name="address_line2" value="{{Auth::user()->address_line2}}" placeholder="City">
							        </div>
							        <div class="col-lg-3">
							            <input class="form-control" type="text" name="zipCode" required value="{{Auth::user()->zipCode}}" placeholder="Zip Code">
							        </div>
							    </div>


								<div class="form-group row">
							   
								 <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Division</label>
							    <div class="col-lg-4">
									<select class="form-control"  name="division_id">
										<option selected="" disabled>Please Select the Division </option>
										@foreach ($divisions as $division)
										<option  value="{{$division->id}}"
											@if($division->id == Auth::user()->division_id)
											selected
											@endif>
										{{$division->name}} </option>
										@endforeach			
									</select>
							    </div>

								<label class="col-lg-1 font-weight-bold text-dark col-form-label form-control-label text-2">District</label>
								<div class="col-lg-4">
								<select class="form-control"  name="district_id">
										<option selected="" disabled>Please Select the District </option>
										@foreach ($districts as $district)
										<option  value= "{{$district->id}}"
										@if($district->id == Auth::user()->district_id)
											selected
											@endif
										> {{$district->name}}</option>
										@endforeach			
								</select>
							     </div>

								 
								</div>

								
								<div class="form-group row">
							        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Country</label>
							        <div class="col-lg-9">
							            <!-- <input class="form-control" type="text" required name="country_name" value="{{Auth::user()->country_name}}" placeholder=""> -->
										<select type="text" name="country_name" class="form-control" required>
															<option selected="" value="Bangladesh" readonly>Bangladesh</option>
										</select>
							        </div>
							    </div>


							    <div class="form-group row">
									<div class="form-group col-lg-9">
										
									</div>
									<div class="form-group col-lg-3">
										<input type="submit" value="Save" class="btn btn-primary btn-modern float-right" data-loading-text="Loading...">
									</div>
							    </div>

							</form>

							<!-- 2nd form Password Section -->
							<form action="{{route('Customer_Dashboard.password.update', Auth::user()->id)}}" method="POST" class="needs-validation" enctype="multipart/form-data">
								@csrf	

							    <div class="form-group row">
							        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">New Password</label>
							        <div class="col-lg-9">
							            <input class="form-control" id="password" name="password" placeholder="" required autocomplete="new-password">
							        </div>
							    </div>

							    <div class="form-group row">
							        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Confirm password</label>
							        <div class="col-lg-9">
							            <input class="form-control" id="password_confirmation" name="password_confirmation" placeholder="" required autocomplete="new-password">
							        </div>
							    </div>

								<div class="form-group row">
									<div class="form-group col-lg-9">
										
									</div>
									<div class="form-group col-lg-3">
										<input type="submit" value="Save" class="btn btn-primary btn-modern float-right" data-loading-text="Loading...">
									</div>
							    </div>

							</form>

						</div>
					</form>
					</div>

					<!-- dada -->

				</div>

			</div>
			@endsection

			@section('body-script')
			@endsection


	