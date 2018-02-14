@extends('layouts.front')
@section('content')
<section>
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-3 text-center banner-line1">
				Win Your County&#39;s 
				Next Jackpot</h1>
		</div>
		<div class="overlay"></div>
	</div>
</section>
<section id="app" class="featured">
	<h1 class="text-center featured-heading">Active Draws</h1>
	<div class="container">
		<div class="row featured-line d-none d-lg-flex">
			<div class=" col-lg-2 ">
				<h4></h4>
			</div>
			<div class=" col-lg-3 text-center">
				<h4>Draw</h4>
			</div>
			<div class=" col-lg-2 text-center">
				<h4>Minimum Win</h4>
			</div>
			<div class=" col-lg-3 text-center">
				<h4>Time to draw</h4>
			</div>
			<div class=" col-lg-2 text-center">
				<h4>Click to buy</h4>
			</div>
		</div>
		@foreach ($lotteries as $lottery)
		<lottery-display-item-bs4 :lottery="{{ $lottery->currentLottery }}"></lottery-display-item-bs4>
		@endforeach
		@if (count($globalLotteries) > 0)
		<p class="text-center h4 text-purple"> Global Draws</p>
		@endif
		@foreach ($globalLotteries as $lottery)
		<lottery-display-item-bs4 :lottery="{{ $lottery->currentLottery }}"></lottery-display-item-bs4>
		@endforeach
	</div>
</section>

<section class="container-fluid process clearfix" style="padding-bottom:3rem;">
	{{--  <h3 class="text-center " style="color: white">Easy and Quick Process</h3>  --}}
	<h1 class="text-center text-light" >How to Enter</h1>
	<div class="card-group ">
		<div class="card ">
			<div style="text-align: center;">
				<img class="card-img-top img-fluid" src="img/game.png" alt="Card image cap">
			</div>
			<div class="card-body">
				<h4 class="card-title text-center">1. Play the Memory Game and Select Your Answer</h4>
				<p class="card-text text-center"></p>
			</div>
		</div>
		<div class="card">
			<div style="text-align: center;">
				<img class="card-img-top img-fluid" src="img/cash.png" alt="Card image cap">
			</div>
			<div class="card-body">
				<h4 class="card-title text-center">2. Pay the Entry Fee</h4>
				<p class="card-text text-center"></p>
			</div>
		</div>
		<div class="card">
			<div style="text-align: center;">
				<img class="card-img-top img-fluid" src="img/winner.png" alt="Card image cap">
			</div>
			<div class="card-body">
				<h4 class="card-title text-center">3. Wait for the Draw Results</h4>
				<p class="card-text text-center"></p>
			</div>
		</div>
	</div>
</section>

@if ($featured)
<section>
<div class="container clearfix">
	<section id="timer">
		<h1 class="text-center" style="font-size: 2.5rem; color: #b5009b; padding-bottom:2rem ;"> Featured Draw</h1>
		<div class="text-center ">
			<img class="img-fluid" width="500" src="img/logo.png" alt="" srcset="">
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
		<span style="color: #28a745; font-weight: 700;">
			<i class="fa fa-gbp"></i> {{ number_format($featured->prize, 2, '.', ',') }}</span>
	</h2>
	<div class="text-center">
		<a href="/county-draw/{{ $featured->id }}/buy" class="buy-button">Enter Draw</a>
	</div>
	<h3 class="text-center" style="margin-bottom: 4rem!important;">
		<a class="a-link" href="/results" style=" font-weight: 700; cursor: pointer;">Go to results page</a>
	</h3>
</section>
@else
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

@endif

@endsection
	
@section('script')
@if ($featured)
<script type="text/javascript">
	var featured = JSON.parse('<?= json_encode($featured) ?>') ;
	var t = moment('{{ $featured->expire_at->endOfDay()->toW3cString() }}');
	$(document).ready(function () {
		var interval = setInterval(function time() {
			d = moment()
			var diff = moment.duration(t.diff(d))
			if(t.diff(d) <= 0){
				clearInterval(interval)
			}
			var format =  diff.format('h:mm:ss', true);
			format = format.split(':');
			var hours = format[0];
			var min = format[1];
			var sec = format[2];
			jQuery('#countdown #hour').html(hours);
			jQuery('#countdown #min').html(min);
			jQuery('#countdown #sec').html(sec);
		}, 1000);
	});
	
</script>
@endif
	
@endsection