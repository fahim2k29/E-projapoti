@extends('backend.layout.master')
@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form method="POST" action="{{route('clientComment.update.confirm',$comments->id)}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="exampleInputPassword1">Serial dd</label>
                    <input type="text" class="form-control" value="{{$comments->serial}}" name="client_comment_serial">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" class="form-control" value="{{$comments->name}}" name="client_comment_name">
                </div>


                <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <img src="{{ asset('images/'.$comments->image) }}" alt="">
                </div>

                <div class="form-group">
                    <input type="file" name="image[]" class="form-control" > 
                </div>



                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea name="client_comment_desc"  class="form-control" id="" cols="50" rows="5">{{$comments->desc}}</textarea>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Category Status</label>
                    <select class="form-control" id="exampleInputPassword1" name="client_comment_status">
                        @if($comments->status == 1 )
                            <option selected value="1">Publish</option>
                            <option value="0">Unpublish</option>
                        @else
                            <option  value="1">Publish</option>
                            <option selected value="0">Unpublish</option>
                        @endif
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
               
            </form>

        </div>
    </div>
@endsection
