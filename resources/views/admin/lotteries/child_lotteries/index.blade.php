@extends('admin.layout.master')

@section('title', 'Admin | On Going / Expired Draws')

@section('content_header')
    <h1>On Going / Expired Draws</h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="fa fa-dashboard"></i> Home
            </a>
        </li>
        <li class="active">On Going / Expired Draws</li>
    </ol>
@stop

@section('content')
<div class="box box-success">
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
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
                            Winner
                        </th>
                        <th>
                            Entry Fee
                        </th>
                        <th>
                            Prize
                        </th>
                        <th>
                            # Participents
                        </th>
                        <th>
                            Total Collection
                        </th>
                        <th>
                            Prize Approved Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($lotteries as $index => $lottery)
                        <tr>
                            <td> {{ $lottery->hasExpired() ? 'Draw Closed' : 'On Going' }} </td>
                            <td>{{$lottery->created_at->format('jS M Y')}} to {{ $lottery->expire_at->format('jS M Y')}}</td>
                            <td>{{$lottery->name}}</td>
                            <td>
                                @if ($lottery->winner)
                                    <a href="/admin/users/{{$lottery->winner->id}}/profile">{{$lottery->winner->name}}</a>
                                @else
                                    --
                                @endif
                            </td>
                            <td> <i class="fa fa-gbp"></i> {{$lottery->entryInPound()}}</td>
                            <td> <i class="fa fa-gbp"></i> {{$lottery->prize}}</td>
                            <td> 
                                {{ $lottery->participants_count }}   
                                @if ($lottery->participants_count)
                                    <a href="/admin/county-draws/{{$lottery->id}}/participants">View</a>
                                @endif

                            </td>
                            <td>
                                {{ $lottery->totalCollection() }}
                            </td>
                            <td>
                                @if ($lottery->hasWinner())
                                    @if ($lottery->prize_money_approved)
                                    <span class="label label-success">Approved</span>
                                    @else
                                    <span class="label label-warning">Pending</span> 
                                    <a href="/admin/county-draws/{{$lottery->id}}/approve" > <span class="btn btn-primary btn-sm pull-right">Click to Approve</span></a>
                                    @endif
                                @endif
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
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
