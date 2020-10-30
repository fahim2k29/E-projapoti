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
            <form method="POST" action="{{route('category.insert')}}">
                @csrf

                <div class="form-group">
                    <label for="exampleInputPassword1">Serial</label>
                    <input type="text" class="form-control" value="" name="category_serial">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Category Name</label>
                    <input type="text" class="form-control" value="" name="category_name">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Category Icon</label>
                    <input type="text" class="form-control" value="" name="category_icon">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Feature Category</label>
                    <select class="form-control" id="exampleInputPassword1" name="feature_category">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Category Status</label>
                    <select class="form-control" id="exampleInputPassword1" name="category_status">
                        <option value="1">Publish</option>
                        <option value="0">Unpublish</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Insert</button>

            </form>
        </div>
    </div>






@endsection
