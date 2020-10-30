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

            <form method="POST" action="{{ route('backend.quickFooter.insert') }}">
                @csrf

                <div class="form-group">
                    <label for="exampleInputPassword1">Title</label>
                    <input type="text" class="form-control" value="" name="title">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Menu</label>
                    <input type="text" class="form-control" value="" name="menu">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Section</label>
                    <select class="form-control" name="section" id="">
                        <option value="1">Section One</option>
                        <option value="2">Section Two</option>
                        <option value="3">Section Three</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Status</label>
                    <select class="form-control" name="status" id="">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea name="description" id="summernote"></textarea>
                </div>



                <button type="submit" class="btn btn-primary">Insert</button>

            </form>
        </div>
    </div>




@endsection
