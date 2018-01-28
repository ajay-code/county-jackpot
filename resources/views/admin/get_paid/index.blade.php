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
        <table id="datatable-lotteries" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        User
                    </th>
                    <th>
                        Amount
                    </th>
                    <th>
                        Requested On
                    </th>
                    <th>
                        Approved On
                    </th>
                    <th>
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($getPaids as $getPaid)
                <tr>
                    <td>{{$getPaid->id}}</td>
                    <td>
                        <a href="/admin/users/{{$getPaid->user->id}}/profile">
                            {{$getPaid->user->name}}
                        </a>
                    </td>
                    <td>
                            <i class="fa fa-gbp"></i>
                            {{$getPaid->amount}}
                    </td>
                    <td>{{$getPaid->created_at->format('jS M Y')}}</td>
                    <td>
                        @if ($getPaid->status)
                            {{ $getPaid->approved_on->format('jS M Y') }}        
                        @else
                            ---
                        @endif
                    </td>
                    <td>
                        @if ($getPaid->status)
                            <span class="label label-success">done</span>
                        @else
                            <span class="label label-warning">pending</span>
                            <a href="{{ route('admin.payment-requests.approve', ['payment' => $getPaid->id]) }}" > <span class="btn btn-primary btn-sm pull-right">Mark Done</span></a>
                        @endif
                    </td>
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
