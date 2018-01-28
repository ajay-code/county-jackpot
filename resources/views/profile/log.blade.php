@extends('adminlte::page')

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
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Responsive Hover Table</h3>
                <div class="box-tools">
                    
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>Draw Name</th>
                            <th>Result Declared On</th>
                            <th>Prize Amount</th>
                            <th>Approved On</th>
                        </tr>
                        @foreach ($approvals as $index => $approval)
                            <tr>
                                <td> {{ $index + 1 }} </td>
                                <td> {{ $approval->lottery->name }} </td>
                                <td> {{ $approval->lottery->expire_at->format('jS F, Y') }} </td>
                                <td> <i class="fa fa-gbp"></i>{{ $approval->lottery->prize }} </td>
                                <td> {{ $approval->created_at->format('jS F, Y') }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
                    {{ $approvals->links() }}
            </div>
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
</script>
@stop
