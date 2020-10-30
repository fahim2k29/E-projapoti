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
            @foreach($result as $SeoData)

                <form method="POST" action="{{route('seo.update',$SeoData->id)}}">
                    @csrf



                    <div class="form-group">
                        <label for="exampleInputPassword1">Seo Description</label>
                        <input type="text" class="form-control" value="{{$SeoData->web_description}}" name="seo_description">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Seo Keyword</label>
                        <input type="text" class="form-control" value="{{$SeoData->web_keyword}}" name="seo_keyword">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Seo Author</label>
                        <input type="text" class="form-control" value="{{$SeoData->author}}" name="seo_author">
                    </div>


                    <button type="submit" class="btn btn-primary">Update</button>
                    @endforeach
                </form>
        </div>
    </div>




@endsection





