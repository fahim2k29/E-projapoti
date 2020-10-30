@extends('backend.layout.master')
@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form method="POST" action="{{route('area.update.confirm',$areas->id)}}">
                @csrf

                <div class="form-group">
                    <label for="exampleInputPassword1">Area Name</label>
                    <input type="text" class="form-control" value="{{ $areas->area_name }}" name="area_name">
                </div>


                <button type="submit" class="btn btn-primary">Update</button>

            </form>
        </div>
    </div>




@endsection
