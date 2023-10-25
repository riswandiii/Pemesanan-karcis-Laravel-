@extends('RegisterLogin.main')

@section('content')

<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">

				<form class="login100-form validate-form" action="/login" method="post">
					@csrf
				{{-- Alert --}}
				@if(session()->has('success'))
				<div class="row">
					<div class="col-lg-12">
						<small>
							<div class="alert alert-primary" role="alert">
								{{ session('success') }}
							</div>
						</small>
					</div>
				</div>
				@endif
				{{-- End Alert --}}

					<span class="login100-form-title p-b-43">
						Please {{ $title }}
					</span>
					
					
					<div class="form-floating mb-3">
						<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email') }}" name="email">
						<label for="email">Email address</label>
						@error('email')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					  </div>

					  <div class="form-floating">
						<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password">
						<label for="password">Password</label>
						@error('password')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					  </div>

					  <div class="mt-3">
						<button type="submit" class="btn btn-primary w-100">LOGIN</button>
					  </div>
					
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							don't have an account yet? <a href="/registrasi">Registration</a>
						</span>
					</div>

					<div class="login100-form-social flex-c-m">
						<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-facebook-f" aria-hidden="true"></i>
						</a>

						<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('images/background.jfif');">
				</div>
			</div>
		</div>
	</div>
	

@endsection