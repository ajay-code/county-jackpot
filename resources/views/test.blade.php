@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div id="app">
        <loader></loader>
    </div>
@stop

@section('js')
    <script src="{{url('js/app.js')}}"></script>
@stop