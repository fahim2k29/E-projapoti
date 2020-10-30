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
            <form method="POST" action="{{ route('whyPeopleLove.update.confirm',$whyPeopleLoves->id) }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <img src="{{ asset('images/'.$whyPeopleLoves->image) }}" alt="">                    
                </div>

                 <div class="form-group">
                    <input type="file" name="image[]" class="form-control" > 
                </div>
                
                <div class="form-group">
                    <label for="exampleInputPassword1">Status</label>
                    
                    <select class="form-control" name="status" id="">
                        <option value="">@if ($whyPeopleLoves->status == 1) Active @else Inactive @endif </option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Insert</button>

            </form>
        </div>
    </div>






@endsection
