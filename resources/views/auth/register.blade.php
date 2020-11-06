@extends('layout.app')

@section('content')
	<div class="container right-panel-active" id="container">
		<div class="form-container sign-up-container">
			<form method="POST" action="{{ route('register') }}">
				@csrf
				<h1>Create Account</h1>
				@error('name')
					<strong class="err-msg">{{ $message }}</strong>
				@enderror
				<input type="text" name="name" placeholder="Name" value="{{ old('name') }}"/>

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
					@error('password_confirmation')
						<strong class="err-msg">{{ $message }}</strong>
					@enderror
				</span>
				<input type="password" name="password_confirmation" placeholder="Confirm password" />


				<button type="submit">Sign Up</button>
			</form>
		</div>

		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Welcome Back!</h1>
					<p>To keep connected with us please login with your personal info</p>
					<button class="ghost" id="signIn" onclick="window.location='/login';">Sign In</button>
				</div>
			</div>
		</div>
	</div>
@endsection