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
                        @foreach ($user->lotteries as $index => $lottery)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{$lottery->lottery->name}}</td>
                            <td><i class="fa fa-gbp"></i>{{(float) $lottery->lottery->entry_fee / 100 }}</td>
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
    
</div>
@stop

@section('css')
    <style>
            td { white-space:pre }
    </style>
@endsection

@section('js')
<script>
        $(document).ready(function () {
            $('#datatable').DataTable({
                "order": [
                    [0, "desc"]
                ]
            });
        });
</script>
@stop
