@extends('adminlte::page')

@section('title', 'Counties')

@section('content_header')
    <h1>Transactions</h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="fa fa-dashboard"></i> Home
            </a>
        </li>
        <li class="active">Transactions</li>
    </ol>
@stop

@section('content')
<div class="box box-success">
    
    <!-- /.box-header -->
    <div class="box-body">
        <table id="datatable-transactions" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Amount
                    </th>
                    <th>
                        Lottery
                    </th>
                    <th>
                        status
                    </th>
                    <th>
                        On
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $index =>$transaction)
                <tr>
                    <td>{{$index + 1}}</td>
                    <td><i class="fa fa-gbp"></i>{{(float)$transaction->amount / 100 }}</td>
                    <td>{{$transaction->lottery->name}}</td>
                    <td>
                        @if ($transaction->status == 'incomplete')
                            <a href="lotteries/{{$transaction->id}}/game">{{$transaction->status}}</a>
                        @elseif($transaction->status == 'entered')
                            Entered draw successfully
                        @elseif($transaction->status == 'failed')
                            Failed to enter draw
                        @endif
                    </td>
                    <td>{{$transaction->created_at->format('jS F, Y')}}</td>
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
            $('#datatable-transactions').DataTable();
        });
</script>
@stop
