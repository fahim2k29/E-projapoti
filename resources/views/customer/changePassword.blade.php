

@extends('frontend.layout.master')


@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <h4 class="custom-h4-font-weight">Change Password</h4>
          <form action="{{ route('customer.changePassword_store') }}" method="POST">
          @csrf

            @if (session()->has('success'))
                <h4 class="text-success">{{ session('success') }}</h4>
            @endif

            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach

            <div class="form-group">
              <label for="exampleInputEmail1">Current Password</label>
              <input name="current_password" type="password" class="form-control">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">New Password</label>
              <input id="myInput" name="new_password" type="password" class="form-control">
              <input type="checkbox" onclick="myFunction()">Show Password
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Re-type new Password</label>
              <input name="confirm_new_password" type="password" class="form-control">
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-danger btn-lg btn-block">Submit</button>
            </div>
          </form>
        </div>
        <div class="col-md-4">

        </div>
      </div>

    </div>

@endsection

@section('script')
<script>
    function myFunction() {
      var check = document.getElementById("myInput");
      if (check.type === "password") {
        check.type = "text";
      } else {
        check.type = "password";
      }
    }
    </script>
@endsection
