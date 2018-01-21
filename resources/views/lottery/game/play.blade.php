@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{--  <h1>Lotteries</h1>  --}}
@stop

@section('content')
    <div  class="box box-success" style="min-height: 100vh">
        <div class="box-body">
            <div id="app">
                <game :parent-lottery="{{ $parentLottery }}"></game>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="https://checkout.stripe.com/checkout.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
@stop