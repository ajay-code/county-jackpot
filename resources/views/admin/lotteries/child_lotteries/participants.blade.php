@extends('admin.layout.master')

@section('title', 'Admin | Counties Draws Participants')

@section('content_header')
    <h1>Counties Draws Participants</h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="fa fa-dashboard"></i> Home
            </a>
        </li>
        <li class="active">Counties Draws</li>
        <li class="active">Participants</li>
    </ol>
@stop

@section('content')
<div class="box box-success">
    <!-- /.box-header -->
    <div class="box-body">
        <div class="form-group">
            @if ($lottery->hasWinner())
                <a href="/admin/county-draws/{{$lottery->id}}/winner" class="btn btn-primary">Show Winner</a>
            @else
                @if ($lottery->hasExpired())
                    Winner Not Decided
                @else
                    Draw Still Ongoing
                @endif
            @endif
        </div>
        <div class="table-responsive">
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
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
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($lottery->participants as $index => $participant)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $participant->name }}</td>
                            <td>{{ $participant->email }}</td>
                            <td>{{ $participant->phone }}</td>
                            <td>{{ $participant->street_address }}</td>
                            <td><a href="/admin/users/{{$participant->id}}/draws">{{ $participant->lotteries_count }}</a></td>
                            <td></td>
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
