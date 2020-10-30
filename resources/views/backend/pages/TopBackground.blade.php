@extends('backend.layout.master')
@section('content')

    <div class="container" style="width: 100%">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @foreach($result as $topBackgroud)

                    <form method="POST" action="{{route('topbackground.update',$topBackgroud->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group invisible">
                            <label for="exampleInputPassword1">ID</label>
                            <input type="text" class="form-control" value="{{$topBackgroud->id}}" name="id">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Top Background Text</label>
                            <input type="text" class="form-control" value="{{$topBackgroud->text}}" name="topBackgroud_name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Top Background Image</label>
                            <input type="file" class="form-control" value="{{$topBackgroud->image}}" name="topBackgroud_logo">
                            <img class="mt-2" src="{{asset('images/'.$topBackgroud->image)}}" alt="" style="width: 100px;">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        @endforeach
                    </form>
            </div>
        </div>


    </div>



@endsection
