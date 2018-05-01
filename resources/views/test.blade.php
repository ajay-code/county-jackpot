@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    {{--  <div id="app">  --}}
        <form action="/test/payment" method="POST">
            {{ csrf_field() }}
            <script
              src="https://checkout.stripe.com/checkout.js" class="stripe-button"
              data-key="pk_test_iLBfcQst3G8qAbyrYVBjeadW"
              data-amount="2000"
              data-name="The County Jackpot"
              data-description="Widget"
              data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
              data-locale="auto"
              data-currency="gbp">
            </script>
          </form>
    {{--  </div>  --}}
@stop

@section('js')
    
    <script src="{{url('js/app.js')}}"></script>
@stop