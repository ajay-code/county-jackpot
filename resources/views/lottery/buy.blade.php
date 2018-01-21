@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{--  <h1>Lotteries</h1>  --}}
@stop

@section('content')
    <div  class="box box-success" >
        <div class="box-body">
                <div id="app">
                    <lottery :lottery="{{ json_encode($parentLottery->currentLottery())}}"></lottery>
                </div>
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@stop