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
<div class="row">

<div class="box box-success">
    <div class="box-header">
        <h3 class="box-title">Data Table With Full Features</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        @if ($featured)
            
        <h3>Featured Drwa</h3>
        <table id="datatable-lotteries" class="table table-bordered table-striped">
                <thead>
                    <tr>
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
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$featured->name}}</td>
                        <td> <i class="fa fa-gbp"></i> {{$featured->entryInPound()}}</td>
                        <td> <i class="fa fa-gbp"></i> {{$featured->prize}}</td>
                        <td>{{$featured->expire_at->format('jS M Y')}}</td>
                        <td>{{$featured->always_active}}</td>
                    </tr>
                </tbody>
            </table>
        @else
            <h3>No Featured Draw Set</h3>
        @endif
    </div>
    <!-- /.box-body -->
</div>
</div>
<div class="row">
    <form action="{{ route('admin.featured') }}" method="post">
    <div class="box">
        <div class="box-body">
            <h3>Select Featured Draw</h3>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <div class="col-sm-6">
                        <select class="form-control" name="featured" required>
                            <option value="">Select Draw</option>
                            @foreach ($lotteries as $lottery)
                                <option value="{{ $lottery->id }}" 
                                    {{ $lottery->isFeatured() ? 'selected': '' }}
                                >
                                {{ $lottery->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
@stop

@section('js')
<script>
        
</script>
@stop
