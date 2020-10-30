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
            <form method="POST" action="{{route('subsubcategory.update.confirm',$SingleSubCategory->id)}}">
                @csrf

                <div class="form-group">
                    <label for="exampleInputPassword1">Serial</label>
                    <input type="text" class="form-control" value="{{$SingleSubCategory->serial}}" name="sub_category_serial">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">SubCategory select</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                        @foreach($category as $id => $name)
                            <option value="{{ $id }}" {{ old('subcategory_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Sub SubCategory Name</label>
                    <input type="text" class="form-control" value="{{$SingleSubCategory->name}}" name="sub_category_name">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Sub SubCategory Icon</label>
                    <input type="text" class="form-control" value="{{$SingleSubCategory->icon}}" name="sub_category_icon">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">SubCategory Status</label>
                    <select class="form-control" id="exampleInputPassword1" name="sub_category_status">
                        @if($SingleSubCategory->status == 1 )
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
                    <select class="form-control" id="exampleInputPassword1" name="feature_subcategory">
                        @if($SingleSubCategory->feature_subsubcategory == 1)
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
