@extends('admin.layout.master')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    {{ var_dump(Auth::user()) }}
@stop

@section('css')
    {{--  <link rel="stylesheet" href="/css/admin_custom.css">  --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop