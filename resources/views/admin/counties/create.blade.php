@extends('admin.layout.master')

@section('title', 'Counties')

@section('content_header')
    <h1>Counties</h1>
    <ol class="breadcrumb">
        <li>
            <a href="/admin/home">
                <i class="fa fa-dashboard"></i> Home
            </a>
        </li>
        <li>
            <a href="{{route('admin.counties.index')}}">
                <i class="fa fa-flag"></i> Counties
            </a>
        </li>
        <li class="active">Create</li>
    </ol>
@stop

@section('content')
<div class="col-md-8 col-md-offset-2">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Counties Form</h3>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- /.box-header -->
        <!-- form start -->
        <form method="post" action="{{ route('admin.counties.store') }}">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input autofocus name="name" type="text" class="form-control" id="name" value="{{old('name')}}" placeholder="Name" required>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="reset" class="btn btn-default">reset</button>
                <button type="submit" class="btn btn-success pull-right">Create</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
</div>

@stop
