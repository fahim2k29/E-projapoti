@extends('backend.layout.master')
@section('content')

    <div class="container" style="width: 100%">
        <h2><a href="{{ route('backend.quickFooter.show') }}" class="btn btn-danger">Add New Quick Page</a></h2>
        <h2>Footer Quick Section List</h2>
        <table class="table table-bordered">
            <thead>
            <tr user="row">
                <th class="bg-dark" style="width: 10px">Serial</th>
                <th class="bg-dark" style="width: 10px">Title</th>
                <th class="bg-dark" style="width: 20px">Menu</th>
                <th class="bg-dark" style="width: 10px">Section</th>
                <th class="bg-dark" style="width: 10px">Status</th>
                <th class="bg-dark" style="width: 30px">Description</th>
                <th class="bg-dark" style="width: 10px">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($QuickFooter as $key=>$QuickFooter)
                <tr>
                    <td> {{ $key+1 }} </td>
                    <td> {{ $QuickFooter->title }} </td>
                    <td> {{ $QuickFooter->menu }} </td>
                    <td>
                        @if($QuickFooter->section == 1)
                            One
                        @elseif($QuickFooter->section == 2)
                            Two
                        @elseif($QuickFooter->section == 3)
                            Three
                        @endif
                    </td>
                    <td>
                        @if($QuickFooter->status==0)
                            Inactive
                        @elseif($QuickFooter->status==1)
                            Active
                        @endif
                    </td>
                    <td> {{ $QuickFooter->description }} </td>
                    <td>
                        <div class="btn-group btn-group-mini btn-corner">
                            <a href="{{ route('quickFooter.update',$QuickFooter->id) }}" class="btn btn-xs btn-info" ><i class="ace-icon fa fa-pencil">Update</i></a>

                            <a href="{{ route('quickFooter.delete',$QuickFooter->id) }}" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>









@endsection
