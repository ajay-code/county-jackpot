@extends('adminlte::page')

@section('title', 'Counties')

@section('content_header')
    <h1>Lotteries Bought</h1>
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
<div class="box">
    <div class="box-header">
        {{--  <h3 class="box-title">Counties List</h3>  --}}
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="datatable-counties" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Charge ID
                    </th>
                    <th>
                        Amount
                    </th>
                    <th>
                        Lottery
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                <tr>
                    <td>{{$transaction->id}}</td>
                    <td>{{$transaction->charge_id}}</td>
                    <td><i class="fa fa-gbp"></i>{{(float)$transaction->amount / 100 }}</td>
                    <td>{{$transaction->lottery->name}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
@stop

@section('js')
<script>
        $(document).ready(function(){
            $('#datatable-counties').DataTable();
        });
</script>
@stop
