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
            <form method="POST" action="{{ route('brand.insert') }}">
                @csrf


                <div class="form-group">
                    <label for="exampleInputPassword1">Brand Name</label>
                    <input type="text" class="form-control" value="" name="brand_name">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Brand Icon</label>
                    <input type="text" class="form-control" value="" name="brand_icon">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Brand Status</label>
                    <select class="form-control" id="exampleInputPassword1" name="brand_status">
                        <option value="1">Publish</option>
                        <option value="0">Unpublish</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Insert</button>

            </form>
        </div>
    </div>






@endsection
