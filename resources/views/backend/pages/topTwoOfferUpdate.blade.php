@extends('backend.layout.master')
@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('TopTwoOffer.insert') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="exampleInputPassword1">Top Offer Name</label>
                    <input type="text" class="form-control" value="{{ $topOffer->offerName }}" name="topOffer_name">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Top Offer Image</label>
                    <img src="{{ asset('images/'. $topOffer->image ) }}" style="height: 100px;" alt="">
                    <input type="file" class="form-control" value="" name="topOffer_image[]">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Top Offer Category</label>
                    <select class="form-control"  name="topOffer_category">
                        <option value="" disabled>Select</option>
                        @foreach($categories as $category )
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach

                        @foreach($subCategories as $subCategory )
                            <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                        @endforeach

                        @foreach($subsubCategories as $subsubCategories )
                            <option value="{{ $subsubCategories->id }}">{{ $subsubCategories->name }}</option>
                        @endforeach

                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Insert</button>

            </form>
        </div>
    </div>






@endsection
