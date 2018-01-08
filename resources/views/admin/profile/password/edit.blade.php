@extends('admin.layout.master')

@section('title', 'Profile | Change Password')

@section('content_header')
@stop

@section('content')
<div class="row">

<div class="col-md-8 col-md-offset-2">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">
                @if ($user->password)
                    Change Password
                @else
                    Set Password
                @endif
            </h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        @if (!$user->password)
        <form method="post" action="{{route('admin.password.set')}}" class="form-horizontal">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-sm-4 control-label">Password</label>

                    <div class="col-sm-6">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="col-sm-4 control-label">Confirm Password</label>

                    <div class="col-sm-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success pull-right">
                    Set Password
                </button>
            </div>
        </form>
        @else
        <form method="post" action="{{route('admin.password.update')}}" class="form-horizontal">
            {{ csrf_field() }}
            <div class="box-body">
                @if(Session::has('pwd'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i>Success</h4>
                        {{ Session::get('pwd') }}
                    </div>
                @endif
                <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                    <label for="old_password" class="col-sm-4 control-label">Current Password</label>

                    <div class="col-sm-6">
                        <input id="old_password" type="password" class="form-control" name="old_password" required>

                        @if ($errors->has('old_password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('old_password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-sm-4 control-label">New Password</label>

                    <div class="col-sm-6">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="password-confirm" class="col-sm-4 control-label">Confirm Password</label>

                    <div class="col-sm-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success pull-right">
                    Set Password
                </button>
            </div>
        </form>
        @endif
    </div>
</div>
</div>

@stop

@section('css')
    {{--  <link rel="stylesheet" href="/css/admin_custom.css">  --}}
@stop