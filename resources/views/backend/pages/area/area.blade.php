@extends('backend.layout.master')
@section('content')

    <div class="container" style="width: 100%">
        <h2><a href="{{route('backend.area.show')}}" class="btn btn-danger">Add New Area</a></h2>
        <h2>Area List</h2>
        <table class="table table-bordered">
            <thead>
            <tr user="row">
                <th class="bg-dark" >Serial</th>
                <th class="bg-dark">Area Name</th>
                <th class="bg-dark">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($areas as $key=>$area)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{$area->area_name}}</td>
                    <td>
                        <div class="btn-group btn-group-mini btn-corner">
                            <a href="{{route('area.update',$area->id)}}"
                               class="btn btn-xs btn-info"
                               title="Edit">
                                <i class="ace-icon fa fa-pencil">Update</i>
                            </a>

                            <a href="{{route('area.delete',$area->id)}}"
                               class="btn btn-xs btn-danger"
                               onclick="delete_check({{$area->id}})"
                               title="Delete">
                                <i class="ace-icon fa fa-trash-o"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>








@endsection
