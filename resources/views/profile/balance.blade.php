@extends('adminlte::page')

@section('title', 'Counties')

@section('content_header')
    <h1>Counties</h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="fa fa-dashboard"></i> Home
            </a>
        </li>
        <li class="active">Counties</li>
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
                    <span class="h3"> Complete Bank Details To Get Paid </span>
                    @else
                    <a href="{{ route('get-paid') }}" data-toggle="modal" data-target="#getPaidConfirm" class="btn btn-success btn-lg">
                        Get Paid
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
            <div class="box-header">
                <h3 class="box-title">Responsive Hover Table</h3>
                <div class="box-tools">

                </div>
            </div>
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
                    <p class="h4">To get paid you need to provide your bank details</p>
                    <a href="bank-details/edit" class="btn btn-primary btn-lg"> Complete Bank Details </a>
                </div>
                @else
                <p class="h4">Current Payment Datails</p>
                <br>
                <div class="row">

                    <div class="col-sm-12">
                        <div class="col-xs-6 col-sm-2">
                            IBAN
                        </div>
                        <div class="col-xs-6 col-sm-10">
                            : {{$user->bankDetail->iban}}
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-6 col-sm-2">
                            BBAN
                        </div>
                        <div class="col-xs-6 col-sm-10">
                            : {{$user->bankDetail->bban}}
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-xs-6 col-sm-2">
                            Bank Identifier
                        </div>
                        <div class="col-xs-6 col-sm-10">
                            : {{$user->bankDetail->bank_identifier}}
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-xs-6 col-sm-2">
                            Branch Identifier
                        </div>
                        <div class="col-xs-6 col-sm-10">
                            : {{$user->bankDetail->branch_identifier}}
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-xs-6 col-sm-2">
                            Account Number
                        </div>
                        <div class="col-xs-6 col-sm-10">
                            : {{$user->bankDetail->account_number}}
                        </div>
                        <div class="clearfix"></div>

                    </div>
                    <div class="col-sm-12">
                        <br>
                        <div class="col-xs-12">
                            <a href="bank-details/edit" class="btn btn-primary btn-sm"> Update Bank Details </a>
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
                    You will get Paid on the following Bank Details
                </h4>
            </div>
            <div class="modal-body">
                <div class="row margin-top-bottom">
                    <div class="col-sm-12">
                        <div class="col-xs-6 col-sm-4">
                            IBAN
                        </div>
                        <div class="col-xs-6 col-sm-8">
                            : {{$user->bankDetail->iban}}
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-6 col-sm-4">
                            BBAN
                        </div>
                        <div class="col-xs-6 col-sm-8">
                            : {{$user->bankDetail->bban}}
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-xs-6 col-sm-4">
                            Bank Identifier
                        </div>
                        <div class="col-xs-6 col-sm-8">
                            : {{$user->bankDetail->bank_identifier}}
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-xs-6 col-sm-4">
                            Branch Identifier
                        </div>
                        <div class="col-xs-6 col-sm-8">
                            : {{$user->bankDetail->branch_identifier}}
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-xs-6 col-sm-4">
                            Account Number
                        </div>
                        <div class="col-xs-6 col-sm-8">
                            : {{$user->bankDetail->account_number}}
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
