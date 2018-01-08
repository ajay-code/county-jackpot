<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
	<title>UK Lottery Company</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
	    crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Salsa|Share|Sniglet" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oregano|Passion+One" rel="stylesheet">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.4/flexslider.min.css" />
</head>

<body>
	<section>
		<nav class="navbar navbar-expand-md navbar-light bg-faded clearfix">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content"
			    aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<!-- Brand -->
			<a class="navbar-brand logo" href="#">
				<img src="img/logo.png">
			</a>
			<!-- Links -->
			<div class="collapse navbar-collapse justify-content-end" id="nav-content">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="#">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Draw Results</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Contact</a>
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
							<a class="dropdown-item" href="/lotteries">Lotteries</a>
							<a class="dropdown-item" href="/my-lotteries">My Lotteries</a>
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
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1 class="display-3 text-center banner-line1">Win Supercash Everyday</h1>
				<p class="lead text-center banner-line2">We are one of the best and most trusted lottery website in UK</p>
			</div>
			<div class="overlay"></div>
			<a href="#">
				<div class="coin"></div>
			</a>
			<div class="side"></div>

		</div>
	</section>



	<section id="app" class="featured">
		<h1 class="text-center featured-heading">Lotteries </h1>
		<div class="container">
			<div class="container">

				<div class="row featured-line d-none d-lg-flex">
					<div class=" col-lg-2 ">
						<h4>Lottery</h4>
					</div>
					<div class=" col-lg-3 text-center">
						<h4>County</h4>
					</div>
					<div class=" col-lg-2 text-center">
						<h4>Jackpot</h4>
					</div>
					<div class=" col-lg-3 text-center">
						<h4>Time to draw</h4>
					</div>
					<div class=" col-lg-2 text-center">
						<h4>Click to buy</h4>
					</div>
				</div>
				@foreach ($lotteries as $lottery)
				<lottery-display-item :lottery="{{ json_encode($lottery->currentLottery()) }}"></lottery-display-item>
				@endforeach
			</div>
	</section>

	<section class="container-fluid process clearfix" style="padding-bottom:3rem;">
		<h3 class="text-center " style="color: white">Easy and Quick Process</h3>
		<h1 class="text-center" style="color: white">What makes us best in the market?</h1>
		<div class="card-group ">
			<div class="card ">
				<div style="text-align: center;">
					<img class="card-img-top img-fluid" src="img/cash.png" alt="Card image cap">
				</div>
				<div class="card-body">
					<h4 class="card-title text-center">1. Pay lottery Fees</h4>
					<p class="card-text text-center">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little
						bit longer.</p>
				</div>
			</div>
			<div class="card">
				<div style="text-align: center;">
					<img class="card-img-top img-fluid" src="img/game.png" alt="Card image cap">
				</div>
				<div class="card-body">
					<h4 class="card-title text-center">2. Play a game and answer</h4>
					<p class="card-text text-center">This card has supporting text below as a natural lead-in to additional content.</p>
				</div>
			</div>
			<div class="card">
				<div style="text-align: center;">
					<img class="card-img-top img-fluid" src="img/winner.png" alt="Card image cap">
				</div>
				<div class="card-body">
					<h4 class="card-title text-center">3. Wait for the draw results</h4>
					<p class="card-text text-center">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
				</div>
			</div>
		</div>
		<div class="text-center">
			<a class="buy-button" style="padding: 10px 3.5rem; background:#c73240;margin-top: 2.5rem!important" href="contact.html" role="button">Learn More</a>
		</div>
	</section>

	<div class="container clearfix">
		<section id="timer">
			<h1 class="text-center" style="font-size: 2.5rem; color: #1ea5ea; padding-bottom:2rem ;"> Featured Lottery</h1>
			<div class="text-center ">
				<img class="img-fluid" src="img/powerball.png" width="500px" height="120px">
			</div>

			<div class="row">
				<div class=" col-sm-12 col-md-6 countdown-wrapper text-center mb20">
					<div class="card">

						<div class="card-block">
							<div id="countdown">
								<div class="well">
									<span id="hour" class="timer bg-success"></span>
									<span id="min" class="timer bg-info"></span>
									<span id="sec" class="timer bg-primary"></span>
								</div>
							</div>
						</div>

					</div>
				</div>

			</div>
		</section>
	</div>
	
	<h2 class="text-center">Jackpot Prize :
		<span style="color: #28a745; font-weight: 700;"> <i class="fa fa-gbp"></i> 77,200,000</span>
	</h2>
	<div class="text-center">
		<a href="#" class="buy-button">Buy Lottery</a>
	</div>
	<h3 class="text-center" style="margin-bottom: 4rem!important;">
		<a href="#" style=" font-weight: 700; cursor: pointer;">Go to results page</a>
	</h3>
	</section>

	<section>

		<div class="m-t-3"></div>
		<footer class="mainfooter" role="contentinfo">

			<div class="footer-middle">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-6">
							<!--Column1-->
							<div class="footer-pad">
								<h4>Address</h4>
								<address>
									<ul class="list-unstyled">
										<li>
											City Hall
											<br> 212 Street
											<br> Lawoma
											<br> 735
											<br>
										</li>
										<li>
											Phone: 0
										</li>
									</ul>
								</address>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<!--Column1-->
							<div class="footer-pad">
								<h4>Popular Services</h4>
								<ul class="list-unstyled">
									<li>
										<a href="#"></a>
									</li>
									<li>
										<a href="#">Payment Center</a>
									</li>
									<li>
										<a href="#">Contact Directory</a>
									</li>
									<li>
										<a href="#">Forms</a>
									</li>
									<li>
										<a href="#">News and Updates</a>
									</li>
									<li>
										<a href="#">FAQs</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<!--Column1-->
							<div class="footer-pad">
								<h4>Website Information</h4>
								<ul class="list-unstyled">
									<li>
										<a href="#">Website Tutorial</a>
									</li>
									<li>
										<a href="#">Accessibility</a>
									</li>
									<li>
										<a href="#">Disclaimer</a>
									</li>
									<li>
										<a href="#">Privacy Policy</a>
									</li>
									<li>
										<a href="#">FAQs</a>
									</li>
									<li>
										<a href="#">Webmaster</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<!--Column1-->
							<div class="footer-pad">
								<h4>Popular Departments</h4>
								<ul class="list-unstyled">
									<li>
										<a href="#">Parks and Recreation</a>
									</li>
									<li>
										<a href="#">Public Works</a>
									</li>
									<li>
										<a href="#">Police Department</a>
									</li>
									<li>
										<a href="#">Fire</a>
									</li>
									<li>
										<a href="#">Mayor and City Council</a>
									</li>
									<li>
										<a href="#"></a>
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
						<div class="col-xs-12">
							<!--Footer Bottom-->
							<p class="text-center">&copy; Copyright 2016 - City of USA. All rights reserved.</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</section>


	<script src="js/app.js"></script>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
	    crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
	    crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
	    crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.4/jquery.flexslider-min.js"></script>

	<script type="text/javascript">
		$(document).ready(function () {
			setInterval(function time() {
				var d = new Date();
				var hours = 24 - d.getHours();
				var min = 60 - d.getMinutes();
				if ((min + '').length == 1) {
					min = '0' + min;
				}
				var sec = 60 - d.getSeconds();
				if ((sec + '').length == 1) {
					sec = '0' + sec;
				}
				jQuery('#countdown #hour').html(hours);
				jQuery('#countdown #min').html(min);
				jQuery('#countdown #sec').html(sec);
			}, 1000);
		});
		(function () {

			// store the slider in a local variable
			var $window = $(window),
				flexslider = {
					vars: {}
				};

			// tiny helper function to add breakpoints
			function getGridSize() {
				return (window.innerWidth < 600) ? 2 :
					(window.innerWidth < 900) ? 3 : 4;
			}

			$window.on('load', function () {
				$('.flexslider').flexslider({
					animation: "slide",
					animationLoop: false,
					itemWidth: 210,
					itemMargin: 5,
					minItems: getGridSize(), // use function to pull in initial value
					maxItems: getGridSize() // use function to pull in initial value
				});
			});

			// check grid size on resize event
			$window.resize(function () {
				var gridSize = getGridSize();

				flexslider.vars.minItems = gridSize;
				flexslider.vars.maxItems = gridSize;
			});
		}());
	</script>
</body>

</html>