@extends('admin.layout.master')

@section('title', 'Counties')

@section('content_header')
    <h1>User Draws Won</h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="fa fa-dashboard"></i> Home
            </a>
        </li>
        <li class="active">Users</li>
        <li class="active">Draws</li>
        <li class="active">Won</li>
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
                                Started On
                            </th>
                            <th>
                                Closed On
                            </th>
                            <th>
                                Won / Not Won
                            </th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($user->lotteriesWon as $index => $draw)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{$draw->name}}</td>
                            <td><i class="fa fa-gbp"></i>{{(float) $draw->entryInPound() }}</td>
                            <td><i class="fa fa-gbp"></i>{{(float) $draw->prize }}</td>
                            <td>{{$draw->created_at->format('jS F, Y')}}</td>
                            <td>{{$draw->expire_at->addDays(1)->format('jS F, Y')}}</td>
                            <td>
                                won
                            </td>
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
