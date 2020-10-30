@extends('backend.layout.master')
@section('content')

    <div class="container" style="width: 100%">
        <h2><a href="{{ route('backend.footerQuickThree.show') }}" class="btn btn-danger">Add New Quick Page</a></h2>
        <h2>Footer Quick Section Two List</h2>
        <table class="table table-bordered">
            <thead>
            <tr user="row">
                <th class="bg-dark" style="width: 10px">Serial</th>
                <th class="bg-dark" style="width: 30px">Menu Name</th>
                <th class="bg-dark" style="width: 30px">Description</th>
                <th class="bg-dark" style="width: 10px">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($FooterQuicks as $key=>$FooterQuick)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{!! $FooterQuick->menu !!} </td>
                        <td>{!! $FooterQuick->description !!}  </td>
                        <td>
                            <div class="btn-group btn-group-mini btn-corner">
                                <a href="{{ route('footerQuickThree.update',$FooterQuick->id) }}" class="btn btn-xs btn-info" ><i class="ace-icon fa fa-pencil">Update</i></a>

                                <a href="{{ route('footerQuickThree.delete',$FooterQuick->id) }}" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>









@endsection
