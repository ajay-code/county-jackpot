@extends('admin.layout.master')

@section('title', 'Counties')

@section('content_header')
    <h1>County Draw Winner</h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="fa fa-dashboard"></i> Home
            </a>
        </li>
        <li class="active">County Draw</li>
        <li class="active">Winner</li>
    </ol>
@stop

@section('content')
<div class="box box-success">
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>
                            name
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Phone
                        </th>
                        <th>
                            Street Address
                        </th>
                        <th>
                            All Lotteries Till Now
                        </th>
                        <th>
                            Prize Approved Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>{{ $lottery->winner->name }}</td>
                            <td>{{ $lottery->winner->email }}</td>
                            <td>{{ $lottery->winner->phone }}</td>
                            <td>{{ $lottery->winner->street_address }}</td>
                            <td><a href="/admin/users/{{$lottery->winner->id}}/draws">{{ $lottery->winner->lotteries_count }} View</a></td>
                            <td>
                                @if ($lottery->prize_money_approved)
                                <span class="label label-success">Approved</span>
                                @else
                                <span class="label label-warning">Pending</span> <a href="/admin/county-draws/{{$lottery->id}}/approve" > <span class="label label-primary">Click to Approve</span></a>
                                @endif
                            </td>
                        </tr>
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
</script>
@stop
