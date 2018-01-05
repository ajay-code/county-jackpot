@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lotteries</h1>
@stop

@section('content')
    <div id="app" class="box">
        <div class="box-header">
            <h3 class="box-title">Lotteries</h3>
        </div>
        <div class="box-body">
            @foreach ($lotteries as $lottery)
                <lottery-display-item :lottery="{{ json_encode($lottery->currentLottery())}}"></lottery-display-item>
            @endforeach
        </div>
    </div>
    {{--  {{ var_dump($lotteries) }}  --}}
@stop

@section('js')
    <script src="js/app.js"></script>
@stop