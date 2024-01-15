
@extends('auth.layout.template')
@section('auth-body')
<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
					
						<div class="card shadow-none">
							<div class="card-body">

								    <div class="border p-4 rounded">
									<div class="text-center mb-4">
										<h3 class="">Admin Sign In</h3>
									
									</div>
									<div class="login-separater text-center mb-4"> <span>SIGN IN WITH EMAIL</span>
										<hr/>
									</div>
                                     
                                    
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <!-- Error -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <div class="form-body">
                    <form  method="POST" action="{{ route('login') }}" class="row g-4">
                        @csrf

                        <!-- Email -->
                        <div class="col-12">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required autofocus autocomplete="email" value="{{old('email')}}">
                        </div>


                        <!-- Password -->
                        <div class="col-12">
                            <label for="password" class="form-label">Enter Password</label>
                            <div class="input-group" id="show_hide_password">
                                <input type="password" class="form-control border-end-0" id="password" name="password" placeholder="Enter Password"  required autocomplete="current-password"> 
                                <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                            </div>
                        </div>
                        


                        <div class="col-md-6 text-end">	
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                            {{__('Forgot your password?') }}</a>
                        @endif
                        </div>

                        <div class="col-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>{{__('Sign In')}}</button>
                            </div>
                        </div>

                        <div class="col-12 text-center">
                            <p class="mb-0">{{__('Dont have an account yet? ')}}<a href="{{route('register')}}">{{__('Sign up here')}}</a>
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
@endsection







