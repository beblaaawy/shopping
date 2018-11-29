@include('includes/header')

<?php

$email = '';

if (session()->exists('data')) {
	$email = session()->get('data')['email'];
}
?>
	
	<section id="form"><!--form-->
		<div class="container">
			@include('includes/alerts')
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="/login" method="post">
							{{ csrf_field() }}
							<input type="email" name="email" placeholder="Email address" value="{{ $email }}" />
							<input type="password" name="password" placeholder="Password" />
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="/register" method="post">
							{{ csrf_field() }}
							<input type="text" placeholder="First Name" name="first_name" />
							<input type="text" placeholder="Last Name" name="last_name" />
							<input type="email" placeholder="Email Address" name="email" />
							<input type="password" placeholder="Password" name="password" />
							<input type="radio" name="gender" value="female" />Female
							<input type="radio" name="gender" value="male" />Male
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
@include('includes/footer')