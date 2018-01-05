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
            <h3 class="box-title">Lottery Edit Form # {{ $parentLottery->id }}</h3>
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
        <form method="post" action="{{ route('admin.lotteries.update', ['lottery' => $parentLottery->id]) }}">
            {{ csrf_field() }} 
            {{ method_field('PUT') }}
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input autofocus name="name" type="text" class="form-control" id="name" value="{{old('name') ?old('name') :$parentLottery->name}}" placeholder="Name" required>
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="county">County</label>
                    <select name="county_id" id="county" class="form-control">
                        @foreach ($counties as $county)
                            <option value="{{$county->id}}" {{ $parentLottery->county_id == $county->id ? 'selected':'' }}>{{$county->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="entry_fee">Entry Fee</label>
                    <input name="entry_fee" type="number" class="form-control" id="entry_fee" value="{{old('entry_fee') ? old('entry_fee'):$parentLottery->entry_fee}}" placeholder="Entry Fee" required>
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="expire_at">Run Till</label>
                    <input name="expire_at" type="date" class="form-control" id="expire_at" value="{{old('expire_at') ? old('expire_at') : $parentLottery->expire_at->toDateString()}}" placeholder="Entry Fee" required>
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="prize">prize</label>
                    <input name="prize" type="prize" class="form-control" id="prize" value="{{old('prize') ? old('prize') : $parentLottery->prize}}" placeholder="Prize" required>
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
