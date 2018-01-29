@extends('admin.layout.master')

@section('title', 'Admin | Counties Draws Info')

@section('content_header')
    <h1>Counties Draws Info</h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="fa fa-dashboard"></i> Home
            </a>
        </li>
        <li class="active">Counties Draws Info</li>
    </ol>
@stop

@section('content')
<div class="box box-success">
    
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
                    <td> <i class="fa fa-gbp"></i> {{$lottery->entryInPound()}}</td>
                    <td> <i class="fa fa-gbp"></i> {{$lottery->prize}}</td>
                    <td>{{$lottery->expire_at->format('jS M Y')}}</td>
                    <td>{{$lottery->always_active}}</td>
                    <td>
                        <a href="{{route('admin.county-draw-info.edit', ['lottery' => $lottery->id])}}">
                            <button class="btn btn-success">
                                <i class="fa fa-edit"></i>
                            </button>
                        </a>

                        <form method="post" action="{{route('admin.county-draw-info.destroy', ['lottery' => $lottery->id])}}" style="display:inline-block">
                            {{ csrf_field() }} {{ method_field('DELETE') }}
                            <a href="{{route('admin.county-draw-info.destroy', ['lottery' => $lottery->id])}}">
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
        <a href="{{route('admin.county-draw-info.create')}}">
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
