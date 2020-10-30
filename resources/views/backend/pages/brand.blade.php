@extends('backend.layout.master')
@section('content')

    <div class="container" style="width: 100%">
        <h2><a href="{{route('brand.show')}}" class="btn btn-danger">Add New Brand</a></h2>
        <h2>Brand List</h2>
        <table class="table table-bordered">
            <thead>
            <tr user="row">
                <th class="bg-dark" style="width: 10px">ID</th>
                <th class="bg-dark" style="width: 30px">Brand Name</th>
                <th class="bg-dark" style="width: 30px">Brand Icon</th>
                <th class="bg-dark" style="width: 20px">Brand Status</th>
                <th class="bg-dark" style="width: 10px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($BrandData as $key=>$BrandData)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{$BrandData->name}}</td>
                    <td>{{$BrandData->logo}}</td>
                    <td>@if($BrandData->status == 1) Publish @else Unpublish @endif</td>
                    <td>
                        <div class="btn-group btn-group-mini btn-corner">
                            <a href="{{route('brand.update',$BrandData->id)}}"
                               class="btn btn-xs btn-info"
                               title="Edit">
                                <i class="ace-icon fa fa-pencil">Update</i>
                            </a>

                            <a href="{{route('brand.delete',$BrandData->id)}}"
                                    class="btn btn-xs btn-danger"
                                    onclick="delete_check({{$BrandData->id}})"
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
