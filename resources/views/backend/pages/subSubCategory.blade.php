@extends('backend.layout.master')
@section('content')

    <div class="container" style="width: 100%">
        <h2><a href="{{route('subsubcategory.show')}}" class="btn btn-danger">Add New Sub SubCategory</a></h2>
        <h2>Sub SubCategory List</h2>
        <table class="table">
            <thead>
            <tr>
                <th>Serial</th>
                <th>SubCategory Name</th>
                <th>Sub SubCategory Name</th>
                <th>Sub SubCategory Icon</th>
                <th>Sub SubCategory Status</th>
                <th>Feature Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($result as $value)
                <tr>
                    <td>{{$value->serial}}</td>

                    <td>{{optional($value->subCategory)->name}}</td>

                    <td>{{$value->name}}</td>
                    <td>{{$value->icon}}</td>
                    <td>@if($value->status == 1) Publish @else Unpublish @endif</td>
                    <td>@if($value->feature_subsubcategory == 1) Yes @else No @endif</td>
                    <td><a href="{{route('subsubcategory.update',$value->id)}}">Edit</a></td>
                    <td><a href="{{route('subsubcategory.delete',$value->id)}}">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>








@endsection
