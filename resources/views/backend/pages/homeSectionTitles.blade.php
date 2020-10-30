@extends('backend.layout.master')
@section('content')


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @foreach($result as $HomeSectionData)

                <form method="POST" action="{{route('sectiontitle.update',$HomeSectionData->id)}}">
                    @csrf


                    <div class="form-group">
                        <label for="exampleInputPassword1">Product Category Title</label>
                        <input type="text" class="form-control" value="{{$HomeSectionData->product_category}}" name="product_category">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">How To Order Title</label>
                        <input type="text" class="form-control" value="{{$HomeSectionData->how_to_order}}" name="how_to_order">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Special Offer Title</label>
                        <input type="text" class="form-control" value="{{$HomeSectionData->special_offer}}" name="special_offer">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Why Love Us Title</label>
                        <input type="text" class="form-control" value="{{$HomeSectionData->why_love_us}}" name="why_love_us">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">What Clients Say Title</label>
                        <input type="text" class="form-control" value="{{$HomeSectionData->what_clients_say}}" name="what_clients_say">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Be A Family Title</label>
                        <input type="text" class="form-control" value="{{$HomeSectionData->be_a_family}}" name="be_a_family">
                    </div>


                    <button type="submit" class="btn btn-primary">Update</button>
                    @endforeach
                </form>
        </div>
    </div>



@endsection





