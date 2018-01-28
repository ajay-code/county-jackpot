@extends('admin.layout.master')

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
<div class="box box-success">
    <div class="box-header">
        <h3 class="box-title">Data Table With Full Features</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-bordered table-striped">
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
                        @foreach ($user->lotteries as $index => $draw)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{$draw->lottery->name}}</td>
                            <td><i class="fa fa-gbp"></i>{{(float) $draw->lottery->entry_fee / 100 }}</td>
                            <td><i class="fa fa-gbp"></i>{{(float) $draw->lottery->prize }}</td>
                            <td>{{$draw->draw_number}}</td>
                            <td>{{$draw->created_at->format('jS F, Y')}}</td>
                            <td>{{$draw->lottery->expire_at->addDays(1)->format('jS F, Y')}}</td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</div>
@stop

@section('css')
    <style>
    </style>
@endsection

@section('js')
<script>
        $(document).ready(function () {
            $('#datatable').DataTable();
        });
</script>
@stop
