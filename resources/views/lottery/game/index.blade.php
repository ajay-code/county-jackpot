@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{--  <h1>Lotteries</h1>  --}}
@stop

@section('content')
    <div  class="box box-success" >
        <div class="box-body">
            <div class="flex-center">
                <div class="message">
                    <h2 class="text-center">

                        You have successfully paid the entry fee<br>
                    </h2>
                    <h4>
                        To enter the draw you will need to play a little memory game. A group of pictures will be shown on the screen, some of those pictures will be the copy of each other.
                         <br><br><br><b> You need to remember the number of occurences of all the repeating pictures. 
                                Your question will be based on the number of their occurence.
                            </b><br>
                    </h4>
                    <h4 style="margin: 2rem 0px;" class="text-center">
                        For example: Picture A is repeated 2 times, Picture B is repeated 3 times etc.

                    </h4>
                    
        
                    <div class="text-center" style="margin-top:6rem">
                        <a href="/lotteries/{{$parentLottery->id}}/play" >
                            <button class="btn btn-success btn-lg" style="padding:11px 67px">Continue</button>
                        </a>
                    </div>

                    <h3 style="margin-top:4rem; color:red" class="text-center">
                            NOTE: You will enter the draw only if you answer the question correctly
                        
                        </h3>
                </div>

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