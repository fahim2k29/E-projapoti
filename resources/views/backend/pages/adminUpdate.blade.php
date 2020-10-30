
@extends('backend.layout.master')
@section('content')

<style>
    .collapsible {
        background-color: #428BCA;
        color: white;
        cursor: pointer;
        padding: 7px;
        width: 50%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
    }
    .active, .collapsible:hover {
        background-color: #555;
    }
    .content {
        padding: 0 15px;
        width:50%;
        display: none;
        overflow: hidden;
        background-color: #f1f1f1;
    }
</style>


    <div class="col-sm-9">
        <form class="form-horizontal" method="post"
              action="{{route('backend.admin.update',$user->id)}}"
              role="form" enctype="multipart/form-data">
        @csrf



             <div class="form-group">
                <label class="col-sm-2 bolder" for="name">Name
                </label>
                <div class="col-sm-4">
                    <input name="name"
                           type="text"
                           value="{{ $user->name }}"
                           id="name"
                           class="form-control"
                           >
                    {{-- <strong class="red">{{ $errors->first('name') }}</strong> --}}
                    @if($errors->first('name'))
                        <br>
                    @endif
                    {{-- <strong class="red">Minimum 150x33 pixels</strong> --}}
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 bolder" for="price">Email
                </label>
                <div class="col-sm-4">
                    <input name="email"
                           type="email"
                           step="any"
                           value="{{ $user->email }}"
                           id="email"
                           class="form-control"
                           >
                    {{-- <strong class="red">{{ $errors->first('email') }}</strong> --}}
                    @if($errors->first('email'))
                        <br>
                    @endif
                    {{-- <strong class="red">Minimum 150x33 pixels</strong> --}}
                </div>
            </div>

            <button type="button" class="collapsible">Update Password </button>
            <div class="content">
            <div class="form-group">
                <label class="col-sm-2 bolder" for="price">Password
                </label>
                <div class="col-sm-6">
                    <input name="password"
                           type="password"
                           step="any"
                           require="required"
                           id="password"
                           class="form-control"
                           >
                    {{-- <strong class="red">{{ $errors->first('password') }}</strong> --}}
                    @if($errors->first('password'))
                        <br>
                    @endif

                </div>

            </div>
            </div>
            <br><br>

            <!-- Buttons -->
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <button class="btn btn-sm btn-success submit"><i class="fa fa-save"></i> Update</button>

                    <a href="{{ route('backend.admin.index') }}" class="btn btn-sm btn-gray"> <i
                            class="fa fa-refresh"></i>
                        Cancel</a>
                </div>
            </div>
        </form>



    </div>

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
    <script>
    var coll = document.getElementsByClassName("collapsible");
    var i;
    for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
        content.style.display = "none";
        } else {
        content.style.display = "block";
        }
    });
    }
    </script>
@endsection



