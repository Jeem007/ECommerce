
@extends('auth.layout.template')
@section('auth-body')


		<div class="authentication-reset-password d-flex align-items-center justify-content-center">
			<div class="row">
				<div class="col-12 col-lg-10 mx-auto">
					<div class="card">
						<div class="row g-0">
							<div class="col-lg-5 border-end">
								<div class="card-body">
									<div class="p-5">
										<div class="text-start">
											<img src="{{asset('backend/assets/images/logo-img.png')}}" width="180" alt="">
										</div>
										<h4 class="mt-5 font-weight-bold">Genrate New Password</h4>
										<p class="text-muted">We received your reset password request. Please enter your new password!</p>
									
                                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                         <form method="POST" action="{{ route('password.update') }}">
                                            @csrf
                                        <!-- Password Reset Token -->
                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                        
                                        <!-- Email -->
                                        <div class="mb-3 mt-5">
											<label class="form-label" for="email">{{__('Email')}}</label>
											<input id="email" type="email" name="email" value="{{old('email', $request->email)}}" class="form-control" placeholder="Enter new password"  required autofocus autocomplete="email"/>
										</div>

                                        <!-- New Password -->

                                        <div class="mb-3 mt-5">
											<label class="form-label" for="password">{{__('New Password')}}</label>
											<input  id="password" type="password" name="password" class="form-control" placeholder="Enter new password" required />
										</div>



                                        <!-- Confirm Password -->
										<div class="mb-3">
											<label class="form-label" for="password_confirmation">{{__('Confirm Password')}}</label>
											<input   type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm password"  required />
										</div>



										<div class="d-grid gap-2">
											<button type="submit" class="btn btn-primary">   {{ __('Reset Password') }}</button>                                            
										</div>


                                    </form>

									</div>
								</div>
							</div>
							<div class="col-lg-7">
								<img src="{{asset('backend/assets/images/login-images/forgot-password-frent-img.jpg')}}" class="card-img login-img h-100" alt="...">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection

