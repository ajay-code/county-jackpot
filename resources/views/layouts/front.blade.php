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
		<nav class="navbar fixed-top navbar-expand-md navbar-light bg-faded">
			<!-- Brand -->
			<a class="navbar-brand logo" href="/">
				<img src="img/logo.png">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content"
			    aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
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
										<a href="/terms-and-conditions">Terms & Conditions</a>
									</li>
									<li>
										<a href="/policy">Privacy Policy</a>
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
										<a href="/about">About Us</a>
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
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script>
	// $(function () {
	// 	var lastScrollTop = 0;
	// 	var $navbar = $('.navbar');

	// 	$(window).scroll(function(event){
	// 		var st = $(this).scrollTop();

	// 		if (st > lastScrollTop) { // scroll down
	// 			// use this is jQuery full is used
	// 			$navbar.fadeOut()

	// 		} else { // scroll up
	// 			// use this is jQuery full is used
	// 			$navbar.fadeIn()
	// 		}
	// 		lastScrollTop = st;
	// 	});
	// 	});
	$(function () {
  var lastScrollTop = 0;
  var $navbar = $('.navbar');
  var navbarHeight = $navbar.outerHeight();
  var movement = 0;
  var lastDirection = 0;

  $(window).scroll(function(event){
			var st = $(this).scrollTop();
			movement += st - lastScrollTop;

			if (st > lastScrollTop) { // scroll down
				if (lastDirection != 1) {
					movement = 0;
				}
				var margin = Math.abs(movement);
				if (margin > navbarHeight) {
					margin = navbarHeight;
				}
				margin = -(margin + 25);
				$navbar.css('margin-top', margin+"px")

				lastDirection = 1;
			} else { // scroll up
				if (lastDirection != -1) {
					movement = 0;
				}
				var margin = Math.abs(movement);
				if (margin > navbarHeight) {
					margin = navbarHeight;
				}
				margin = margin-navbarHeight;
				$navbar.css('margin-top', margin+"px")

				lastDirection = -1;
			}

			lastScrollTop = st;
			// console.log(margin);
		});
	});
	</script>
	@yield('script')
</body>

</html>
