@extends('admin.layout.master')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        <div class="box box-primary">
            <div class="box-body box-profile">
                {{--  <img class="profile-user-img img-responsive img-circle" src="/img/user.png" alt="User profile picture">  --}}

                <h3 class="profile-username text-center">{{ $user->name }}</h3>

                <p class="text-muted text-center">Profile</p>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Email</b>
                        <span class="pull-right">{{ $user->email }}</span>
                    </li>
                    <li class="list-group-item">
                        <b>Gender</b>
                        <span class="pull-right">{{ $user->gender }}</span>
                    </li>
                    <li class="list-group-item">
                        <b>DOB</b>
                        <span class="pull-right">{{ $user->dob ? $user->dob->format('jS F, Y') : '--' }}</span>
                    </li>
                    <li class="list-group-item">
                        <b>Phone</b>
                        <span class="pull-right">{{ $user->phone }}</span>
                    </li>
                    <li class="list-group-item clearfix">
                        <b>Street Adress</b>
                        <span class="pull-right">{!! nl2br($user->street_address) !!}</span>
                    </li>
                    <li class="list-group-item clearfix">
                        <b>County</b>
                        <span class="pull-right">{{ $user->county ? $user->county->name : '--' }}</span>
                    </li>
                    <li class="list-group-item">
                        <b>Status</b>
                        <span class="pull-right">{{ $user->status }}</span>
                    </li>
                    <li class="list-group-item">
                        <b>Total Draws</b>
                        <span class="pull-right">
                            {{ $user->lotteries()->count() }}
                            <a href="/admin/users/{{$user->id}}/draws"> View</a>
                        </span>
                    </li>
                    <li class="list-group-item">
                        <b>Draws Won</b>
                        <span class="pull-right">
                            {{ $user->lotteriesWon()->count() }}
                            <a href="/admin/users/{{$user->id}}/draws/won" > View</a>
                        </span>
                    </li>
                </ul>

                <p class="text-muted text-center">Bank Details</p>
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b> Bank Name </b>
                        <span class="pull-right"> {{$user->bankDetail->bank_name}} </span>
                    </li>
                    <li class="list-group-item">
                        <b> Account Number </b>
                        <span class="pull-right"> {{$user->bankDetail->account_number}} </span>
                    </li>
                    <li class="list-group-item">
                        <b> Sort Code </b>
                        <span class="pull-right"> {{$user->bankDetail->sort_code}} </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@stop

@section('css')
    {{--  <link rel="stylesheet" href="/css/admin_custom.css">  --}}
@stop

@section('js')
    {{--  <script src="{{url('js/app.js')}}"></script>  --}}
@stop