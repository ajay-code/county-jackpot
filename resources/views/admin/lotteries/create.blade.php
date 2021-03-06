@extends('admin.layout.master')

@section('title', 'Admin | Counties Draws Create')

@section('content_header')
    <h1>Counties Draws Create</h1>
    <ol class="breadcrumb">
        <li>
            <a href="/admin/home">
                <i class="fa fa-dashboard"></i> Home
            </a>
        </li>
        <li>
            <a href="{{route('admin.counties.index')}}">
                <i class="fa fa-flag"></i> Counties Draws
            </a>
        </li>
        <li class="active">Create</li>
    </ol>
@stop

@section('content')
<div class="col-md-8 col-md-offset-2">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Counties Draws Form</h3>
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
        <form method="post" action="{{ route('admin.county-draw-info.store') }}">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input autofocus name="name" type="text" class="form-control" id="name" value="{{old('name')}}" placeholder="Name" required>
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="county">County</label>
                    <select name="county_id" id="county" class="form-control" required>
                        <option value="">Select County</option>
                        @foreach ($counties as $county)
                            <option value="{{$county->id}}">{{$county->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="entry_fee">Entry Fee (In pence)</label>
                    <input name="entry_fee" type="number" class="form-control" id="entry_fee" value="{{old('entry_fee')}}" placeholder="Entry Fee" required>
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="expire_at">Run Till</label>
                    <input name="expire_at" type="date" class="form-control" id="expire_at" value="{{old('expire_at')}}" placeholder="Entry Fee" required>
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="prize">prize</label>
                    <input name="prize" type="prize" class="form-control" id="prize" value="{{old('prize')}}" placeholder="Prize" required>
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
