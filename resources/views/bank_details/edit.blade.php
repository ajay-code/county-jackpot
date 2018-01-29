@extends('adminlte::page')

@section('title', 'Counties')

@section('content_header')
    <h1>Edit Bank Account Details</h1>
    <ol class="breadcrumb">
        <li>
            <a href="/admin/home">
                <i class="fa fa-dashboard"></i> Home
            </a>
        </li>
        <li>
            
                <i class="fa fa-flag"></i> Bank Account Details
        </li>
        <li class="active">Edit</li>
    </ol>
@stop

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Edit bank details for User Account: {{ $user->name }}</h3>
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
            @if (Session::has('details'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                    {{ Session::get('details') }}
                </div>
            @endif
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="{{ route('bank-detail.update') }}">
                {{ csrf_field() }} {{ method_field('PUT') }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="iban">IBAN</label>
                        <input autofocus name="iban" type="text" class="form-control" id="name" value="{{old('iban') ?old('iban') :$user->bankDetail->iban}}"
                            placeholder="IBAN" required>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="iban">BBAN</label>
                        <input  name="bban" type="text" class="form-control" id="name" value="{{old('bban') ?old('bban') :$user->bankDetail->bban}}"
                            placeholder="IBAN" required>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="iban">Bank Identifier</label>
                        <input  name="bank_identifier" type="text" class="form-control" id="name" value="{{old('bank_identifier') ?old('bank_identifier') :$user->bankDetail->bank_identifier}}"
                            placeholder="Bank Identifier" required>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="iban">Branch Identifier</label>
                        <input  name="branch_identifier" type="text" class="form-control" id="name" value="{{old('branch_identifier') ?old('branch_identifier') :$user->bankDetail->branch_identifier}}"
                            placeholder="Branch Identifier" required>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="iban">Account Number</label>
                        <input  name="account_number" type="text" class="form-control" id="name" value="{{old('account_number') ?old('account_number') :$user->bankDetail->account_number}}"
                            placeholder="Account Number" required>
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
