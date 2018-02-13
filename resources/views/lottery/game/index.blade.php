@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{--  <h2>Lotteries</h2>  --}}
@stop

@section('content')
    <div  class="box box-success" >
        <div class="box-body">
                <p class="h2" style="text-align: center;"><span class="s1"><b>Count the Pictures</b></span></p>
<p class="h4" style="text-align: center;"><span class="s1">In order to enter into the draw you must complete a quick game which is designed to test your memory skills.</span></p>
<p class="h4"><strong><span class="s1">Rules:</span></strong></p>

<ol class="ol1">
 	<li class="li4"><span class="s1">When you click begin the game will start and you will be shown a series of images. You have 10 seconds to remember how many times each image is repeated.</span></li>
 	<li class="li4"><span class="s1">After the timer reaches 0 you will be given a multiple-choice question in relation to the images (e.g. “Which image was repeated 4 times?”).</span></li>
 	<li class="li4"><span class="s1">Select the answer you believe to be correct by clicking the image and submit it via payment.</span></li>
 	<li class="li4"><span class="s1">After payment has been successful you will be entered into the draw.</span></li>
</ol>
<p class="p6" style="text-align: center;"><span class="s1">One entrant with the correct answer will be chosen at random to win the jackpot at the end of the draw.</span></p>
<p class="h2" style="text-align: center;"><strong><span class="s1">Good Luck</span></strong></p>

<ul class="ul1">
 	<li class="li8"><span class="s1">If the prize offered is cash your account balance will be updated upon winning within 3-5 working days. You can view this in the Balance section of your account. From here you can withdraw your winnings into a bank or building society account.</span></li>
 	<li class="li8"><span class="s1">If the prize offered is physical, it will be posted to your provided address within 14 working days.</span></li>
 	<li class="li8"><span class="s1">If the prize draw is for charity 75% of the proceedings will go towards a predetermined charity and the remaining 25% will go towards a charity of the winners choice.</span></li>
 	<li class="li8"><span class="s1">You must only enter your county’s prize draws. Any entry made into a prize draw outside of your county of residence will be forfeit and non-refundable. Proof of identification and proof of address may be required upon winning before any prize is given.</span></li>
 	<li class="li8"><span class="s1">The maximum entry limit for each prize draw is 5. Any entries made over this limit will be forfeit and non-refundable.</span></li>
 	<li class="li8"><span class="s1">Entrants must be 16 or over and must permanently reside in one of the 48 English Counties.</span></li>
</ul>
<p class="p8"><strong><span class="s1">By Selecting Begin, playing the game and submitting your answer via payment you’ll be bound by the </span><span class="s3">Account Terms</span><span class="s1">, the </span><span class="s3">Rules for Draw-Based Games Played Online</span><span class="s1">, the </span><span class="s3">Privacy Policy</span><span class="s4">,</span><span class="s1"> the Game Procedures the </span><span class="s3">Disclaimer</span><span class="s1"> and the information that appears on this page and thereby accept them all.</span></strong></p>
                <div class="text-center" style="margin-top:6rem">
                    <a href="/county-draw/{{$parentLottery->id}}/play" >
                        <button class="btn btn-success btn-lg" style="padding:11px 67px">Continue</button>
                    </a>
                </div>


        </div>
    </div>
@stop
@section('css')
    <style>
        .flex-center{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .message{
            display: flex;
            flex-direction: column;
            width: 800px;
            text-align:justify;
        }

        .message h2{
            color: #34c134;
            margin-bottom:3rem;
        }


    </style>
@endsection
@section('js')
    {{--  <script src="{{ asset('js/app.js') }}"></script>  --}}
@stop