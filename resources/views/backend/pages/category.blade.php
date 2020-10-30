@extends('backend.layout.master')
@section('content')

    <div class="container" style="width: 100%">
        <h2><a href="{{route('category.show')}}" class="btn btn-danger">Add New Category</a></h2>
        <h2>Category List</h2>
        <table class="table">
            <thead>
            <tr>
                <th>Serial</th>
                <th>Category Name</th>
                <th>Category Icon</th>
                <th>Category Status</th>
                <th>Feature Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($CategoryData as $CategoryData)
                <tr>
                    <td>{{$CategoryData->serial}}</td>
                    <td>{{$CategoryData->name}}</td>
                    <td> <i class="{{$CategoryData->icon}} fa-2x"></i> </td>
                    <td>@if( $CategoryData->status == 1) Publish @else Unpublish @endif</td>
                    <td>@if( $CategoryData->feature_category == 1) Yes @else No @endif</td>
                    <td><a href="{{route('category.update',$CategoryData->id)}}">Edit</a></td>
                    <td><a href="{{route('category.delete',$CategoryData->id)}}">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>








@endsection
