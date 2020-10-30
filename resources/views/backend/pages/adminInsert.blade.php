@extends('backend.layout.master')
@section('content')
    <div class="col-sm-9 col-md-12">
        <form class="form-horizontal" method="post" action="{{route('backend.admin.store')}}"
              role="form"
              enctype="multipart/form-data">
        @csrf

            <div class="form-group">
                <label class="col-sm-2 bolder" for="name"> Name
                </label>
                <div class="col-sm-4">
                    <input name="name"
                           type="text"
                           id="name"
                           class="form-control"
                           onchange="readURL(this);">
                    <strong class="red">{{ $errors->first('name') }}</strong>
                    @if($errors->first('name'))
                        <br>
                    @endif
                    {{-- <strong class="red">Minimum 150x33 pixels</strong> --}}
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 bolder" for="email"> Email
                </label>
                <div class="col-sm-4">
                    <input name="email"
                           type="email"
                           id="email"

                           class="form-control"
                           >
                    <strong class="red">{{ $errors->first('email') }}</strong>
                    @if($errors->first('email'))
                        <br>
                    @endif
                    {{-- <strong class="red">Minimum 150x33 pixels</strong> --}}
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 bolder" for="password"> Password
                </label>
                <div class="col-sm-4">
                    <input name="password"
                           type="password"
                           id="password"
                           class="form-control"
                           >
                    <strong class="red">{{ $errors->first('password') }}</strong>
                    @if($errors->first('password'))
                        <br>
                    @endif
                    {{-- <strong class="red">Minimum 150x33 pixels</strong> --}}
                </div>
            </div>


            <!-- Buttons -->
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <button class="btn btn-sm btn-success submit create-button"><i class="fa fa-save"></i> Add
                    </button>

                    <a href="{{route('backend.admin.index')}}" class="btn btn-sm btn-gray"> <i
                            class="fa fa-refresh"></i>
                        Cancel</a>
                </div>
            </div>
        </form>
    </div>

    
@endsection

@push('js')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#current')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
