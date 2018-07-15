@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{--  <h2>Lotteries</h2>  --}}
@stop

@section('content')
<div class="box box-success">
    <div class="box-body">
        <p class="h2 text-purple" style="text-align: center;">
            <span class="s1">
                <b>Count the Pictures</b>
            </span>
        </p>
        <p class="h4" style="text-align: center;">
            <span class="s1">In order to enter into the draw you must complete a quick game which is designed to test your memory skills.</span>
        </p>
        <p class="h4">
            <strong>
                <span class="s1">Rules:</span>
            </strong>
        </p>

        <ol class="ol1">
            <li class="li4">
                <span class="s1">When you click begin the game will start and you will be shown a series of images. You have 10 seconds to
                    remember how many times each image is repeated.</span>
            </li>
            <li class="li4">
                <span class="s1">After the timer reaches 0 you will be given a multiple-choice question in relation to the images (e.g. “Which
                    image was repeated 4 times?”).</span>
            </li>
            <li class="li4">
                <span class="s1">Select the answer you believe to be correct by clicking the image and submit it via payment.</span>
            </li>
            <li class="li4">
                <span class="s1">After payment has been successful you will be entered into the draw.</span>
            </li>
        </ol>
        <p class="p6" style="text-align: center;">
            <span class="s1">One entrant with the correct answer will be chosen at random to win the jackpot at the end of the draw.</span>
        </p>
        <p class="h2 text-purple" style="text-align: center;">
            <strong>
                <span class="s1">Good Luck</span>
            </strong>
        </p>

        <p class="p6" style="text-align: center;">
            <span class="s1">Please familiarize yourself with the <a href="/terms-and-conditions">Terms and conditions</a>, the <a href="/policy">Privacy Policy</a> and the <a href="/disclaimer">Disclaimer</a>.</span>
        </p>
        <form action="/county-draw/{{$parentLottery->id}}/play">
            <p class="p6" style="text-align: center;">
                <span class="s1"> <label style="font-weight: 400"> <input type="checkbox" required> By ticking this box you confirm that you have read and accept The County Jackpot Terms and Conditions, Privacy Policy and Disclaimer. </label></span>
            </p>

            <div class="text-center" style="margin-top:4rem">
                <input class="btn btn-purple btn-lg" type="submit" style="padding:11px 67px" value="Begin">
            </div>
        </form>


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
        .text-purple{
            color: #b5009b !important;
        }

    </style>
@endsection
