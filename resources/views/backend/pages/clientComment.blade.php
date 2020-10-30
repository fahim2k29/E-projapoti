@extends('backend.layout.master')
@section('content')

    <div class="container" style="width: 100%">
        <!-- <h2><a href="{{route('category.show')}}" class="btn btn-danger">Add New Category</a></h2> -->
        <h2>Clients Comment List</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Serial</th>
                <th>Name</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>

                    <td>{{$comment->serial}}</td>
                    <td>{{$comment->name}}</td>
                    <td>
                        <img src="{{ asset('images/'.$comment->image) }}" alt="" style="width: 60px; height: 40px; margin: 5px;">
                    </td>
                    <td>@if( $comment->status == 1) Publish @else Unpublish @endif</td>
                    <td>
                        <div>
                            <a href="{{route('clientComment.update',$comment->id)}}"
                                class="btn btn-xs btn-info"
                                title="Edit">
                                 <i class="ace-icon fa fa-pencil">Update</i>
                             </a>

                             <a href="{{route('clientComment.delete',$comment->id)}}"
                                     class="btn btn-xs btn-danger"
                                     onclick="delete_check({{$comment->id}})"
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
