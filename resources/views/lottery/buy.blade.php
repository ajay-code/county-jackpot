@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{--  <h1>Lotteries</h1>  --}}
@stop

@section('content')
    <div  class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $lottery->name }}</h3>
        </div>
        <div class="box-body">
                <div id="app">
                    <lottery :lottery="{{ json_encode($lottery)}}"></lottery>
                </div>
                
        </div>
    </div>
    {{--  {{ var_dump($lotteries) }}  --}}
@stop

@section('js')
    <script src="https://checkout.stripe.com/checkout.js"></script>
    {{--  <script src="https://js.stripe.com/v3/"></script>  --}}
    <script src="{{ asset('js/app.js') }}"></script>
@stop