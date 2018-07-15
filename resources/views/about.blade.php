@extends('layouts.front')
@section('css')

    <style>
        body{
            font-size: 16px;
            line-height: 1.5;
            color: #333;
            max-width: 100%;
            -webkit-font-smoothing: antialiased !important;
            overflow-wrap: break-word;
            word-wrap: break-word; /* Old syntax */
        }
        h3, h2{
            margin: 20px 0 10px 0;
        }
        .terms{
            min-height: 600px;
            margin-top: 200px;
            margin-bottom: 6rem;
        }
    </style>


@endsection
@section('content')
    <section class="terms container">
        {!! nl2br('<h1 class="p2 text-purple" style="text-align: center;"><span class="s1">About Us</span></h1>
        <p class="p3" style="text-align: center;"><span class="s1">The County Jackpot hosts weekly prize competitions that offer a fun, new way to win cash and great prizes in your county.</span></p>
        <p class="p3" style="text-align: center;"><span class="s1">We also host a number of free to enter prize draws, National based prize draws and charity draws throughout the year.</span></p>
        <p class="p3" style="text-align: center;"><span class="s1">To get involved simply create an account and enter an active draw that is operating in your county either from the “My account” section or the “Active Draw” section homepage. One entrant from each county, who successfully answers the prerequisite memory game question will be chosen at random to win their county\'s jackpot.</span></p>
        <p class="p3" style="text-align: center;"><span class="s1">If you have any enquiries, please feel free to contact the County Jackpot support team via the following email address:</span></p>
        <p class="p5" style="text-align: center;"><span class="s2"><a href="mailto:enquiries@thecountyjackpot.com">enquiries@thecountyjackpot.com</a></span></p>
        <p class="p7"><span class="s1">How to enter:</span></p>
        <p class="p7"><span class="s1">1. Select an active draw that is operating in your county</span></p>
        <p class="p7"><span class="s1">2. Play the multiple-choice memory skill game and select an answer to submit.</span></p>
        <p class="p7"><span class="s1">3. Pay the entry fee.</span></p>
        <p class="p7"><span class="s1">4. Wait for the draw results.</span></p>
        <ul class="ul1">
             <li class="li9"><span class="s1">If the prize offered is cash your account balance will be updated upon winning within 7 working days. You can view this in the Balance section of your account. From here you can withdraw your winnings into a bank or building society account.</span></li>
             <li class="li9"><span class="s1">If the prize offered is physical, it will be posted to the address on your account within 14 working days.</span></li>
             <li class="li9"><span class="s1">You must only enter your county’s prize draws. Any entry made into a prize draw outside of your county of residence will be forfeit and non-refundable. Proof of identification and proof of address may be required upon winning before any prize is given.</span></li>
             <li class="li9"><span class="s1">The maximum entry limit for each prize draw is 5 per person. Any entries made over this limit will be forfeit and non-refundable.</span></li>
             <li class="li9"><span class="s1">Entrants must be 16 or over and must permanently reside in one of the 48 English Counties.</span></li>
        </ul>
        <p class="p10">Please familiarize yourself with the <a href="/terms-and-conditions">Terms and conditions</a>, the <a href="/policy">Privacy Policy</a> and the <a href="/disclaimer">Disclaimer</a>.</p>') !!}
    </section>


@endsection
