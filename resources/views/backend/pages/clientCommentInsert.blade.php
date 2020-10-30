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
            <form method="POST" action="{{route('clientComment.insert')}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="exampleInputPassword1">Serial</label>
                    <input type="text" class="form-control" value="" name="client_comment_serial">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" class="form-control" value="" name="client_comment_name">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" class="form-control" value="" name="image[]">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea name="client_comment_desc" class="form-control" id="" cols="50" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Status</label>
                    <select class="form-control" id="exampleInputPassword1" name="client_comment_status">
                        <option value="1">Publish</option>
                        <option value="0">Unpublish</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Insert</button>

            </form>
        </div>
    </div>

@endsection
