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
                    <input type="text" class="form-control" value="" name="topOffer_name">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Top Offer Image</label>
                    <input type="file" class="form-control" value="" name="topOffer_image[]">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Top Offer Link</label>
                    <input type="text" name="offer_link" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Insert</button>

            </form>
        </div>
    </div>






@endsection
