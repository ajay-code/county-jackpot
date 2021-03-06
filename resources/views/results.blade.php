@extends('layouts.front')
@section('content')
<section id="app" class="clearfix" style="margin-top:190px">
	<h1 class="purple-heading text-center text-light">Draw Results</h1>
	<br>
	<br>
	<div class="container">
		@if ($results_count > 0)
		<div class="row featured-line d-none d-lg-flex">
			<div class=" col-lg-3 ">
				<h4></h4>
			</div>
			<div class=" col-lg-3 text-center">
				<h4>Draw name</h4>
			</div>
			<div class=" col-lg-2 text-center">
				<h4>Jackpot</h4>
			</div>
			<div class=" col-lg-2 text-center">
				<h4>Winner</h4>
			</div>
		</div>

			@foreach ($lotteries as $lottery)
			<div>
				<h6 class="text-center"> Results Declared on : {{ $lottery->resultLottery->expire_at->format('jS F, Y') }} </h6>
			</div>
			<lottery-result :lottery="{{ $lottery->resultLottery }}"></lottery-result>
			@endforeach
		@else
		<h3>No Results To show</h3>
		@endif

	</div>
</section>
@endsection
