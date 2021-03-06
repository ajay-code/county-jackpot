@extends('adminlte::page')

@section('title', 'Balance')

@section('content_header')
    <h1>Balance</h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="fa fa-dashboard"></i> Home
            </a>
        </li>
        <li class="active">Balance</li>
    </ol>
@stop

@section('content')
<div class="row">
    <div class="col-sm-12">
        @if(Session::has('paid'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4>
                <i class="icon fa fa-check"></i> Success!</h4>
            {{ Session::get('paid') }}
        </div>
        @endif
    </div>
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                @if ($user->hasBalance())
                    @if ($user->bankDetail->notComplete())
                    <span class="h3"> Complete Withdrawal details To Withdraw Winnings </span>
                    @else
                    <a href="{{ route('get-paid') }}" data-toggle="modal" data-target="#getPaidConfirm" class="btn btn-success btn-lg">
                        Withdraw Winnings
                    </a>

                    <form id="get-paid-form" action="{{ route('get-paid') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    @endif
                @endif
                <span class="pull-right">
                    <span class="h2">Balance :
                        <i class="fa fa-gbp"></i> {{ $user->balance }}</span>
                </span>
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>Draw Name</th>
                            <th>Result Declared On</th>
                            <th>Prize Amount</th>
                            <th>Approved On</th>
                        </tr>
                        @foreach ($user->approvals as $index => $approval)
                        <tr>
                            <td> {{ $index + 1 }} </td>
                            <td> {{ $approval->lottery->name }} </td>
                            <td> {{ $approval->lottery->expire_at->format('jS F, Y') }} </td>
                            <td>
                                <i class="fa fa-gbp"></i>{{ $approval->lottery->prize }} </td>
                            <td> {{ $approval->created_at->format('jS F, Y') }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="box-footer text-center">
                <a href="balance/log" class=""> View All </a>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                @if($user->bankDetail->notComplete())
                <div class="text-center">
                    <p class="h4">Please complete your details to withdraw your winnings.</p>
                    <a href="bank-details/edit" class="btn btn-primary btn-lg"> Complete Withdrawal details </a>
                </div>
                @else
                <p class="h4">Bank Account Datails</p>
                <br>
                <div class="row">

                    <div class="col-sm-12">
                        <div class="col-xs-6 col-sm-2">
                            Bank Name
                        </div>
                        <div class="col-xs-6 col-sm-10">
                            : {{$user->bankDetail->bank_name}}
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-xs-6 col-sm-2">
                            Account Number
                        </div>
                        <div class="col-xs-6 col-sm-10">
                            : {{$user->bankDetail->account_number}}
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-xs-6 col-sm-2">
                            Sort Code
                        </div>
                        <div class="col-xs-6 col-sm-10">
                            : {{$user->bankDetail->sort_code}}
                        </div>
                        <div class="clearfix"></div>


                    </div>
                    <div class="col-sm-12">
                        <br>
                        <div class="col-xs-12">
                            <a href="bank-details/edit" class="btn btn-primary btn-sm"> Update Withdrawal Details </a>
                        </div>
                    </div>
                </div>

                @endif
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="getPaidConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Winnings will be transferred to the following account, please ensure these details are correct before confirmation.
                </h4>
            </div>
            <div class="modal-body">
                <div class="row margin-top-bottom">
                    <div class="col-sm-12">
                        <div class="col-xs-6 col-sm-4">
                            Bank Name
                        </div>
                        <div class="col-xs-6 col-sm-8">
                            : {{$user->bankDetail->bank_name}}
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-xs-6 col-sm-4">
                            Account Number
                        </div>
                        <div class="col-xs-6 col-sm-8">
                            : {{$user->bankDetail->account_number}}
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-xs-6 col-sm-4">
                            Sort Code
                        </div>
                        <div class="col-xs-6 col-sm-8">
                            : {{$user->bankDetail->sort_code}}
                        </div>
                        <div class="clearfix"></div>



                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="event.preventDefault();
                    document.getElementById('get-paid-form').submit();">Confirm</button>
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
