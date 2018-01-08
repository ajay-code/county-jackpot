@extends('admin.layout.master')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
    <div id="app">
            <user-datatable endpoint="/admin/datatable/users"> </user-datatable>
    </div>
@stop

@section('css')
    {{--  <link rel="stylesheet" href="/css/admin_custom.css">  --}}
@stop

@section('js')
    <script src="{{url('js/app.js')}}"></script>
@stop