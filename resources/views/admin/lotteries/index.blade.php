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
                        Name
                    </th>
                    <th>
                        Entry Fee
                    </th>
                    <th>
                        Prize
                    </th>
                    <th>
                        Expire At
                    </th>
                    <th>
                        Always Active
                    </th>
                    <th>
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lotteries as $lottery)
                <tr>
                    <td>{{$lottery->id}}</td>
                    <td>{{$lottery->name}}</td>
                    <td>{{$lottery->entry_fee}}</td>
                    <td>{{$lottery->prize}}</td>
                    <td>{{$lottery->expire_at->format('jS M Y')}}</td>
                    <td>{{$lottery->always_active}}</td>
                    <td>
                        <a href="{{route('admin.lotteries.edit', ['lottery' => $lottery->id])}}">
                            <button class="btn btn-success">
                                <i class="fa fa-edit"></i>
                            </button>
                        </a>

                        <form method="post" action="{{route('admin.lotteries.destroy', ['lottery' => $lottery->id])}}" style="display:inline-block">
                            {{ csrf_field() }} {{ method_field('DELETE') }}
                            <a href="{{route('admin.lotteries.destroy', ['lottery' => $lottery->id])}}">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </a>
                        </form>
                    </td>
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
            $('#datatable-lotteries').DataTable();
        });
</script>
@stop
