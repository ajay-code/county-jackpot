@extends('adminlte::page')

@section('title', 'Counties')

@section('content_header')
    <h1>Draw tickets Bought</h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="fa fa-dashboard"></i> Home
            </a>
        </li>
        <li class="active">Draws</li>
    </ol>
@stop

@section('content')
<div class="box box-success">
    <div class="box-header">
        {{--  <h3 class="box-title">Counties List</h3>  --}}
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">

            <table id="datatable-user-lotteries" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Fee Paid
                        </th>
                        <th>
                            Prize
                        </th>
                        <th>
                            Draw Number
                        </th>
                        <th>
                            Purchased On
                        </th>
                        <th>
                            Result On
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->lotteries as $index => $lottery)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{$lottery->lottery->name}}</td>
                        <td><i class="fa fa-gbp"></i>{{ $lottery->lottery->entryInPound() }}</td>
                        <td><i class="fa fa-gbp"></i>{{(float) $lottery->lottery->prize }}</td>
                        <td>{{$lottery->draw_number}}</td>
                        <td>{{$lottery->created_at->format('jS F, Y')}}</td>
                        <td>{{$lottery->lottery->expire_at->addDays(1)->format('jS F, Y')}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.box-body -->
</div>
@stop

@section('js')
<script>
        $(document).ready(function(){
            $('#datatable-user-lotteries').DataTable();
        });
</script>
@stop
