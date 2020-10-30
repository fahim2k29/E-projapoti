
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
            <form method="POST" action="{{route('subsubcategory.insert')}}">
                @csrf

                <div class="form-group">
                    <label for="exampleInputPassword1">Serial</label>
                    <input type="text" class="form-control"  name="sub_category_serial">
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
                    <input type="text" class="form-control" value="" name="sub_category_name">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Sub SubCategory Icon</label>
                    <input type="text" class="form-control" value="" name="sub_category_icon">
                </div>


                <div class="form-group">
                    <label for="exampleInputPassword1">Feature Sub SubCategory</label>
                    <select class="form-control" id="exampleInputPassword1" name="feature_subcategory">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">SubCategory Status</label>
                    <select class="form-control" id="exampleInputPassword1" name="sub_category_status">
                        <option value="1">Publish</option>
                        <option value="0">Unpublish</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Insert</button>

            </form>
        </div>
    </div>





@endsection
