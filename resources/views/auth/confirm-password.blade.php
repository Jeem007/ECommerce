
@extends('auth.layout.template')
@section('auth-body')

        <div class="authentication-forgot d-flex align-items-center justify-content-center">
			<div class="card forgot-box shadow-none">
				<div class="card-body">
					<div class="p-4 rounded  border">
						<div class="text-center">
							<img src="assets/images/icons/forgot-2.png" width="120" alt="" />
						</div>
						<h4 class="mt-5 font-weight-bold">{{__('Confirm Your Password?')}}</h4>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('password.confirm') }}">
                         @csrf

						<div class="my-4">
							<label  for="password"  class="form-label">Password</label>
							<input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Enter Your Password" required autocomplete="current-password" />
						</div>

                        <div class="d-grid gap-2">
							<button type="button" class="btn btn-primary btn-lg">  {{ __('Confirm Password') }}</button>
						</div>			
                    </form>


					</div>
				</div>
			</div>
		</div>

@endsection
