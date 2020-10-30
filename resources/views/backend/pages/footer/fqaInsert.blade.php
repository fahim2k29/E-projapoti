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

            <form method="POST" action="{{ route('backend.fqa.insert') }}">
                @csrf

                <div class="form-group">
                    <label for="exampleInputPassword1">Question</label>
                    <input type="text" class="form-control" value="" name="question">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Answer</label>
                    <input type="text" class="form-control" value="" name="answer">
                </div>



                <button type="submit" class="btn btn-primary">Insert</button>

            </form>
        </div>
    </div>






@endsection
