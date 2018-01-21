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
                        status
                    </th>
                    <th>
                        Duration
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Entry Fee
                    </th>
                    <th>
                        Prize
                    </th>
                    <th>
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($lotteries as $index => $lottery)
                    <tr>
                        <td>  {{ $lottery->hasExpired() ? 'Draw Closed' : 'On Going' }} </td>
                        <td>{{$lottery->created_at->format('jS M Y')}} to {{ $lottery->expire_at->format('jS M Y')}}</td>
                        <td>{{$lottery->name}}</td>
                        <td> <i class="fa fa-gbp"></i> {{$lottery->entryInPound()}}</td>
                        <td> <i class="fa fa-gbp"></i> {{$lottery->prize}}</td>
                        <td></td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <a href="{{route('admin.lotteries.create')}}">
            <button class="btn btn-success">
                Create
            </button>
        </a>
    </div>
</div>
@stop

@section('js')
<script>
        $(document).ready(function(){
            $('#datatable-lotteries').DataTable({
                "order": [[ 0, "desc" ]]
            });
        });
</script>
@stop
