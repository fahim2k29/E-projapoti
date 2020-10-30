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

            <form method="POST" action="{{ route('quickFooter.update.confirm',$quickFooters->id) }}">
                @csrf

                <div class="form-group">
                    <label for="exampleInputPassword1">Title</label>
                    <input type="text" class="form-control" value="{{ $quickFooters->title }}" name="title">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Menu</label>
                    <input type="text" class="form-control" value="{{ $quickFooters->menu }}" name="menu">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Section</label>
                    <select class="form-control" name="section" id="">
                        @if($quickFooters->section ==1 )
                             <option selected value="1">Section One</option>
                             <option  value="2">Section Two</option>
                             <option  value="3">Section Three</option>
                        @elseif($quickFooters->section ==2)
                             <option selected value="2">Section Two</option>
                             <option  value="1">Section One</option>
                             <option  value="3">Section Three</option>
                        @elseif($quickFooters->section ==3)
                             <option selected value="3">Section Three</option>
                             <option value="2">Section Two</option>
                             <option  value="1">Section One</option>
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Status</label>
                    <select class="form-control" name="status" id="">
                        @if($quickFooters->status ==1 )
                            <option selected value="1">Active</option>
                            <option  value="0">Inactive</option>
                        @elseif($quickFooters->status ==0)
                            <option  value="1">Active</option>
                            <option selected value="0">Inactive</option>
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea name="description" id="summernote">{!! $quickFooters->description !!}</textarea>
                </div>



                <button type="submit" class="btn btn-primary">Update</button>

            </form>
        </div>
    </div>




@endsection
