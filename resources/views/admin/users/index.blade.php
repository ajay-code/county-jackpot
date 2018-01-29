@extends('admin.layout.master')

@section('title', 'Admin | Users')

@section('content_header')
    <h1>Users</h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="fa fa-dashboard"></i> Home
            </a>
        </li>
        <li class="active">Users</li>
    </ol>
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