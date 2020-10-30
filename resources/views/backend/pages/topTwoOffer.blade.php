@extends('backend.layout.master')
@section('content')

    <div class="container" style="width: 100%">
        <h2><a href="{{route('TopTwoOffer.show')}}" class="btn btn-danger">Add New Top Offer</a></h2>
        <h2>Top Offer List</h2>
        <table class="table table-bordered">
            <thead>
            <tr user="row">
                <th class="bg-dark" style="width: 10px">ID</th>
                <th class="bg-dark" style="width: 30px">Top Offer Name</th>
                <th class="bg-dark" style="width: 30px">Top Offer Image</th>
                <th class="bg-dark" style="width: 20px">Top Offer Category</th>
                <th class="bg-dark" style="width: 10px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($topTwoOfferData as $key=>$topTwoOfferData)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{$topTwoOfferData->offerName}}</td>
                    <td><img src="{{ asset('images/'.$topTwoOfferData->image) }}" style="height: 100px" alt=""></td>
                    <td>{{$topTwoOfferData->offer_link}}</td>
                    <td>
                        <div class="btn-group btn-group-mini btn-corner">
{{--                            <a href="{{ route('TopTwoOffer.update',$topTwoOfferData->id) }}"--}}
{{--                               class="btn btn-xs btn-info"--}}
{{--                               title="Edit">--}}
{{--                                <i class="ace-icon fa fa-pencil">Update</i>--}}
{{--                            </a>--}}

                            <a href="{{ route('TopTwoOffer.delete',$topTwoOfferData->id) }}"
                               class="btn btn-xs btn-danger"
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
