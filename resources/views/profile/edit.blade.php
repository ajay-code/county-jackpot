@extends('adminlte::page')

@section('title', 'Profile')


@section('content')
<div class="row">

<div class="col-md-8 col-md-offset-2">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Profile</h3>
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
        <form method="post" action="{{ route('profile.update', ['profile' => $user->id]) }}">
            {{ csrf_field() }} 
            {{ method_field('PUT') }}
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input autofocus name="name" type="text" class="form-control" id="name" value="{{old('name') ?old('name') :$user->name}}" placeholder="Name" required>
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="county">County</label>
                    <select name="county_id" id="county" class="form-control">
                        <option value="">Select County</option>
                        @foreach ($counties as $county)
                            <option value="{{$county->id}}" {{ $user->county_id == $county->id ? 'selected':'' }}>{{$county->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="">--</option>
                        <option value="male" {{$user->gender == 'male' ? 'selected':''}} >Male</option>
                        <option value="female" {{$user->gender == 'female' ? 'selected':''}} >Female</option>
                    </select>
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input name="phone" type="number" class="form-control" id="phone" value="{{$user->phone}}" placeholder="Phone" >
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="street_address">Street Address</label>
                    <textarea name="street_address" class="form-control" id="street_address" cols="10" rows="5">{{$user->street_address}}</textarea>
                </div>
            </div>
            
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-success pull-right">Update</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
</div>
</div>

@stop

@section('css')
    {{--  <link rel="stylesheet" href="/css/admin_custom.css">  --}}
@stop