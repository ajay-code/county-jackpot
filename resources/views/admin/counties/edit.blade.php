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
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Horizontal Form</h3>
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
        <form method="post" action="{{ route('admin.counties.update', ['county' => $county->id]) }}">
            {{ csrf_field() }} {{ method_field('PUT') }}
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input autofocus name="name" type="name" class="form-control" id="name" value="{{old('name') ? old('name') : $county->name}}"
                        placeholder="Name" required>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Update</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
</div>
@stop
