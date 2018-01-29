@extends('adminlte::page')

@section('title', 'Get Paid')

@section('content_header')
    <h1>Withdrawal History</h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="fa fa-dashboard"></i> Home
            </a>
        </li>
        <li class="active">Withdrawal History</li>
    </ol>
@stop

@section('content')
<div class="box box-success">
    <div class="box-header">
        <h3 class="box-title">Withdrawal History</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="datatable-lotteries" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Amount
                    </th>
                    <th>
                        Requested On
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($getPaids as $index => $getPaid)
                <tr>
                    <td>{{$index + 1}}</td>
                    <td>
                            <i class="fa fa-gbp"></i>
                            {{$getPaid->amount}}
                    </td>
                    <td>{{$getPaid->created_at->format('jS M Y')}}</td>
                   
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
            $('#datatable-lotteries').DataTable();
        });
</script>
@stop
