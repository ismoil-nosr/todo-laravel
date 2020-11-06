@extends('layout.app')

@section('content')
	<div class="container" id="container">
		<div class="form-container sign-in-container">
			<form method="POST" action="{{ route('login') }}">
				@csrf
				<h1>Sign in</h1>
				<span>
					@error('email')
						<strong class="err-msg">{{ $message }}</strong>
					@enderror
				</span>
				<input type="email" name="email" placeholder="Email"  value="{{ old('email') }}"/>

				<span>
					@error('password')
						<strong class="err-msg">{{ $message }}</strong>
					@enderror
				</span>
				<input type="password" name="password" placeholder="Password" value="{{ old('password') }}"/>

				<span>
					<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
					<label class="form-check-label" for="remember">
						{{ __('Remember Me') }}
					</label>
				</span>

				<a href="#">Forgot your password?</a>
				<button type="submit">Sign In</button>
			</form>
		</div>

		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<h1>Hello, Friend!</h1>
					<p>Enter your personal details and start journey with us</p>
					<button class="ghost" id="signUp"  onclick="window.location='/register';">Sign Up</button>
				</div>
			</div>
		</div>
	</div>
@endsection