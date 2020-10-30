@extends('backend.layout.master')
@section('content')

    <div class="container" style="width: 100%">
        <h2><a href="{{route('whyPeopleLove.create')}}" class="btn btn-danger">Add Image</a></h2>
        <h2>Why People Love List</h2>
        <table class="table table-bordered">
            <thead >
            <tr user="row">
                <th class="bg-dark" style="width:15%">ID</th>
                <th class="bg-dark" style="width: 35%">Image</th>
                <th class="bg-dark" style="width: 25%">Status</th>
                <th class="bg-dark" style="width: 25%">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($whyPeopleLoves as $key=>$whyPeopleLove)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>
                        <img src="{{ asset('images/'.$whyPeopleLove->image) }}" alt="" style="width: 60px; height: 40px; margin: 5px;">
                   </td>
                    <td>
                            @if($whyPeopleLove->status == 1)
                                Active
                            @else
                                Inactive
                            @endif
                    </td>
                    <td>
                        <div class="btn-group btn-group-mini btn-corner">
                            <a href="{{ route('whyPeopleLove.update', $whyPeopleLove->id) }}"
                               class="btn btn-xs btn-info"
                               title="Edit">
                                <i class="ace-icon fa fa-pencil"></i>
                            </a>
                            <a href="{{ route('whyPeopleLove.delete', $whyPeopleLove->id) }}"
                                 class="btn btn-xs btn-danger"
                                onclick="delete_check({{$whyPeopleLove->id}})"
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
