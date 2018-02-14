<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
	<title>The County Jackpot</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    @yield('css')
    
	<link href="https://fonts.googleapis.com/css?family=Roboto|Salsa|Share|Sniglet" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oregano|Passion+One" rel="stylesheet">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
</head>

<body>
	<header>
		<nav class="navbar fixed-top navbar-expand-md navbar-light bg-faded clearfix">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content"
			    aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<!-- Brand -->
			<a class="navbar-brand logo" href="/">
				<img src="img/logo.png">
			</a>
			<!-- Links -->
			<div class="collapse navbar-collapse justify-content-end" id="nav-content">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="/">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/about">About Us</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/results">Draw Results</a>
					</li>
					
					@guest
					<li class="nav-item">
						<a class="nav-link" href="/login">Sign in</a>
					</li>
					@endguest
					@auth
					<li class="nav-item dropdown">
						<a class="nav-link" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">My Account</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown01">
							<a class="dropdown-item" href="/county-draw">Active Draws</a>
							<a class="dropdown-item" href="/my-draws">My draws</a>
							<a class="dropdown-item" href="/profile">Profile</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                >
                                    {{ trans('adminlte::adminlte.log_out') }}
                                </a>
                                <form id="logout-form" action="{{ url(config('adminlte.logout_url', 'auth/logout')) }}" method="POST" style="display: none;">
                                    @if(config('adminlte.logout_method'))
                                        {{ method_field(config('adminlte.logout_method')) }}
                                    @endif
                                    {{ csrf_field() }}
                                </form>
						</div>
					</li>
					@endauth
				</ul>
		</nav>
	</header>

    @yield('content')


	<section>
		<div class="mt-3"></div>
		<footer class="mainfooter" role="contentinfo">

			<div class="footer-middle">
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<!--Column1-->
							<div class="footer-pad">
								<h4>Important Links</h4>
								<ul class="list-unstyled">
									<li>
										<a href="/about">About Us</a>
									</li>
									<li>
										<a href="/disclaimer">Disclaimer</a>
									</li>
								</ul>
							</div>
						</div>
						

						

						<div class="col-lg-4 ">
							<!--Column1-->
							<div class="footer-pad">
								<h4>Navigation Links</h4>
								<ul class="list-unstyled">
									<li>
										<a href="/results">Draw Results</a>
									</li>
									<li>
										<a href="/terms-and-conditions">Terms & Conditions</a>
									</li>
									<li>
										<a href="/policy">Privacy Policy</a>
									</li>
									<li>
										<a href="/login">Login</a>
									</li>
									<li>
										<a href="/register">Register</a>
									</li>
								</ul>
							</div>
						</div>

						<div class="col-lg-4 ">
							<!--Column1-->
							<div class="footer-pad">
								<h4>Contact Us</h4>
								<ul class="list-unstyled">
									<li>
										<a href="mailto:customercare@thecountyjackpot.com">customercare@thecountyjackpot.com</a>
									</li>
									<li>
										<a href="mailto:enquiries@thecountyjackpot.com">enquiries@thecountyjackpot.com</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<!--Footer Bottom-->
							<p class="text-center">You must only enter your county's prize draws. Any entry made into a prize draw outside of your county of residence will be forfeit an non- refundable. Proof of identification and address may be required upon winning before any prize is given.</p>
							<p class="text-center">The maximum entry limit for each prize draw is 5. Any entries made over this limit will be forfeit and non-refundable.</p>
							<p class="text-center">Entrants must be aged 16 or over and must permanently reside in one of the 48 English Counties.</p>
							<p class="text-center">&copy; Copyright The County Jackpot 2018 all rights reserved.</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</section>

	<script src="{{ asset('vendor/sweetalert/script.js') }}"></script>
	@include('sweet::alert')
	<script src="js/app.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    @yield('script')
</body>

</html>