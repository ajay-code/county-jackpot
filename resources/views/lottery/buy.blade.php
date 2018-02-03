@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{--  <h1>Lotteries</h1>  --}}
@stop

@section('content')
<div class="row phone-margin">
    <div class="col-sm-12">
        <div  class="box box-success" >
            <div class="box-body">
                    <div id="app">
                        <lottery :lottery="{{$parentLottery->currentLottery}}"></lottery>
                    </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('css')
    <style>
        @media (max-width: 400px ){
           .phone-margin{
            margin-top: 80px
           } 
        }
    </style>
@endsection
@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@stop