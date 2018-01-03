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
                <form action="/lottery/{{$lottery->id}}/buy" method="POST">
                    {{ csrf_field() }}
                    <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="{{ config('services.stripe.key') }}"
                        data-amount="{{ $lottery->entry_fee * 100 }}"
                        data-name="{{$lottery->name}}"
                        data-description="{{$lottery->name}}"
                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                        data-locale="auto"
                        data-zip-code="true"
                        >
                    </script>
                </form>
        </div>
    </div>
    {{--  {{ var_dump($lotteries) }}  --}}
@stop

@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@stop