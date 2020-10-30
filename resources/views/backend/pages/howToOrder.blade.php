@extends('backend.layout.master')
@section('content')

    <div class="container" style="width: 100%">
        <h2><a href="{{route('howToOrder.create')}}" class="btn btn-danger">Add Image</a></h2>
        <h2>How To Order List</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Section</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($images as $key=>$image)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td><img src="{{ asset('images/'.$image->image) }}" style="width:100px" class="img-responsive"></td>
                    <td>{{$image->section}}</td>
                    <td>
                        <div>
                            <a href="{{route('howToOrder.delete',$image->id)}}"
                                class="btn btn-xs btn-danger"
                                onclick="delete_check({{$image->id}})"
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
