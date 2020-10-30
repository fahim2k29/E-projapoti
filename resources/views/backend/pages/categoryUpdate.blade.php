@extends('backend.layout.master')
@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form method="POST" action="{{route('category.update.confirm',$SingleCategory->id)}}">
                @csrf

                <div class="form-group">
                    <label for="exampleInputPassword1">Serial</label>
                    <input type="text" class="form-control" value="{{$SingleCategory->serial}}" name="category_serial">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Category Name</label>
                    <input type="text" class="form-control" value="{{$SingleCategory->name}}" name="category_name">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Category Icon</label>
                    <input type="text" class="form-control" value="{{$SingleCategory->icon}}" name="category_icon">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Category Status</label>
                    <select class="form-control" id="exampleInputPassword1" name="category_status">
                        @if($SingleCategory->status == 1 )
                            <option selected value="1">Publish</option>
                            <option value="0">Unpublish</option>
                        @else
                            <option  value="1">Publish</option>
                            <option selected value="0">Unpublish</option>
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Feature Status</label>
                    <select class="form-control" id="exampleInputPassword1" name="feature_category">
                        @if($SingleCategory->feature_category == 1)
                            <option selected value="1">Yes</option>
                            <option value="0">No</option>
                        @else
                            <option value="1">Yes</option>
                            <option selected value="0">No</option>
                        @endif
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>

            </form>
        </div>
    </div>






@endsection
