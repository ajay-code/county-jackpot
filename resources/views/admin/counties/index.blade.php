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
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Counties List</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="datatable-counties" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($counties as $county)
                <tr>
                    <td>{{$county->id}}</td>
                    <td>{{$county->name}}</td>
                    <td>
                        <a href="{{route('admin.counties.edit', ['county' => $county->id])}}">
                            <button class="btn btn-info">
                                <i class="fa fa-edit"></i>
                            </button>
                        </a>

                        <form method="post" action="{{route('admin.counties.destroy', ['county' => $county->id])}}" style="display:inline-block">
                            {{ csrf_field() }} {{ method_field('DELETE') }}
                            <a href="{{route('admin.counties.destroy', ['county' => $county->id])}}">
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
        <a href="{{route('admin.counties.create')}}">
            <button class="btn btn-primary">
                Create
            </button>
        </a>
    </div>
</div>
@stop

@section('js')
<script>
        $(document).ready(function(){
            $('#datatable-counties').DataTable();
        });
</script>
@stop
