@extends('adminlte::page')

@section('title', 'Counties')

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
                        </span>
                    </li>
                    <li class="list-group-item">
                        <b>Draws Won</b>
                        <span class="pull-right">
                            {{ $user->lotteriesWon()->count() }}
                        </span>
                    </li>
                </ul>

                
                <a href="/profile/edit" class="btn btn-primary btn-block"><b>Edit</b></a>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <style>
            .margin-top-bottom{
                margin: 40px 10px;
            }
    </style>
@endsection

@section('js')
<script>
        $(document).ready(function () {
            $('#datatable').DataTable();
        });
</script>
@stop
