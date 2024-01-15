
@extends('auth.layout.template')
@section('auth-body')

        <div class="authentication-forgot d-flex align-items-center justify-content-center">
			<div class="card forgot-box shadow-none">
				<div class="card-body">
					<div class="p-4 rounded  border">
						<div class="text-center">
							<img src="{{asset('backend/assets/images/icons/forgot-2.png')}}" width="120" alt="" />
						</div>
						<h4 class="mt-5 font-weight-bold">{{__('Forgot Password?')}}</h4>
						<p class="text-muted"> {{ __('No problem. Just let us know your email address.') }}</p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('password.email') }}">
                         @csrf

						<div class="my-4">
							<label for="email" class="form-label">Email Id</label>
							<input type="text" id="email" name="email" value="{{old('email')}}" class="form-control form-control-lg" placeholder="Enter Your Mail"  required autofocus />
						</div>


						<div class="d-grid gap-2">
							<button type="button" class="btn btn-primary btn-lg">  {{ __('Email Password Reset Link') }}</button> <a href="{{route('login')}}" class="btn btn-light btn-lg"><i class='bx bx-arrow-back me-1'></i>{{old('Back to Login')}}</a>
						</div>
                    
                    </form>


					</div>
				</div>
			</div>
		</div>

@endsection

