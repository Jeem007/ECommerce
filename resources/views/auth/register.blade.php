
@extends('auth.layout.template')
@section('auth-body')
	<!--wrapper-->
		<div class="d-flex align-items-center justify-content-center my-lg-0" style="padding-top:150px;">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
					<div class="col mx-auto">
						<div class="card shadow-none">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center mb-4">
										<h3 class="">{{__('Sign Up')}}</h3>
										<p class="mb-6">{{__('Create your account')}}</p>

									<div class="form-body">
                                        <!-- Validation Errors -->
                                         <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                        <form method="POST" class="row g-3" action="{{ route('register') }}" >
                                        @csrf

                                    
                                            <!-- Name -->

											<div class="col-sm-12">
												<label for="name" class="form-label">Full Name</label>
												<input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Full Name" value="{{old('name')}}" required autofocus autocomplete="name">
											</div>


                                            <!-- Email -->

											<div class="col-sm-12">
												<label for="email" class="form-label">Email</label>
												<input type="email" class="form-control" id="email" placeholder="Enter Your Email Address" name="email" value="{{old('email')}}" required autofocus autocomplete="email">
											</div>

                                            <!-- Password -->



                                            <!-- Password -->
											<div class="col-12">
												<label for="password" class="form-label">Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0" id="password" name="password"  placeholder="Enter Your Password" required autocomplete="new-password"> 
                                                    <a href="javascript:;" class="input-group-text bg-transparent">
                                                        <i class='bx bx-hide'></i>
                                                    </a>
												</div>
											</div>



                                            <!--Confirm Password -->

											<div class="col-12">
												<label for="password_confirmation" class="form-label">Confirm Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0" id="password_confirmation" name="password_confirmation"  placeholder="Enter Your Password Again" required autocomplete="new-password"> 
                                                    <a href="javascript:;" class="input-group-text bg-transparent">
                                                        <i class='bx bx-hide'></i>
                                                    </a>
												</div>
											</div>





											<div class="col-12">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
													<label class="form-check-label" for="flexSwitchCheckChecked">{{__('I read and agree to Terms & Conditions')}}</label>
												</div>
											</div>


											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary"><i class='bx bx-user'></i>{{__('Sign up')}}</button>
												</div>
											</div>


											<div class="col-12 text-center">
												<p class="mb-0">{{__('Already have an account? ')}} <a href="{{route('login')}}">{{__('Sign in here')}}</a>
												</p>
											</div>


										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	<!--end wrapper-->

@endsection


