@extends('backend.layout.master')
@section('content')


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
            @foreach($result as $footerMenu)

                <form method="POST" action="{{route('footermenu.update',$footerMenu->id)}}">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputPassword1">Section One Title</label>
                        <input type="text" class="form-control" value="{{$footerMenu->title_one}}" name="title_one">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Section Two Title</label>
                        <input type="text" class="form-control" value="{{$footerMenu->title_two}}" name="title_two">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Section Three Title</label>
                        <input type="text" class="form-control" value="{{$footerMenu->title_three}}" name="title_three">
                    </div>


                    <button type="submit" class="btn btn-primary">Update</button>
                    @endforeach
                </form>
        </div>
    </div>




@endsection





