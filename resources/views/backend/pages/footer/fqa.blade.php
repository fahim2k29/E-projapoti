@extends('backend.layout.master')
@section('content')

    <div class="container" style="width: 100%">
        <h2><a href="{{ route('backend.fqa.show') }}" class="btn btn-danger">Add New Brand</a></h2>
        <h2>Brand List</h2>
        <table class="table table-bordered">
            <thead>
            <tr user="row">
                <th class="bg-dark" style="width: 10px">Serial</th>
                <th class="bg-dark" style="width: 30px">Question</th>
                <th class="bg-dark" style="width: 30px">Answer</th>
                <th class="bg-dark" style="width: 10px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($fqas as $key=>$fqa)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $fqa->question }}</td>
                    <td>{{ $fqa->answer }}</td>
                    <td>
                        <div class="btn-group btn-group-mini btn-corner">
                            <a href="{{ route('fqa.update',$fqa->id) }}" class="btn btn-xs btn-info" ><i class="ace-icon fa fa-pencil">Update</i></a>

                            <a href="{{ route('fqa.delete',$fqa->id) }}" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o"></i></a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>









@endsection
