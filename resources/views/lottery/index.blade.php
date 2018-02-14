@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Active Draws For Your County</h1>
@stop

@section('content')
    <div id="app" class="box box-success">
        <div class="box-header">
            <h3 class="box-title">Active Draws</h3>
        </div>
        <div class="box-body">
            @foreach ($lotteries as $lottery)
                <lottery-display-item-bs3 :lottery="{{ $lottery->currentLottery}}"></lottery-display-item-bs3>
            @endforeach
        </div>
    </div>
    {{--  {{ var_dump($lotteries) }}  --}}
@stop

@section('css')
<style>
    .box{
        min-height: 80vh;
    }
    h3{
        margin-top: 9px;
    }
    .featured-content{
        margin: 25px 0;
    }
</style>
@stop

@section('js')
    <script src="js/app.js"></script>
@stop