
@extends('frontend.layout.master')


@section('content')

    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-md-8">

          <h4 class="custom-h4-font-weight">Your Profile</h4>
          <form action="{{ route('customer.profile.update',Auth::guard('customer')->user()->id ) }}" method="POST">
          @csrf
           
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" name="name" required="required" class="form-control" value="{{ Auth::guard('customer')->user()->name }}" id="exampleInputEmail1" aria-describedby="emailHelp" >
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <div class="input-group">
                  <input type="email" class="form-control" required="required" name="email" value="{{ Auth::guard('customer')->user()->email }}" aria-label="Your Phone" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">Verify</span>
                  </div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Phone</label>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">+88</div>
                </div>
                <input type="text" name="phone" maxlength="11" minlength="11" size="11" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required="required" class="form-control" id="inlineFormInputGroup" value="{{ Auth::guard('customer')->user()->phone }}">
              </div>
            </div>

            <div class="form-group">
              <label for="sel1">Area</label>



              <select name="area" class="form-control" id="sel1" >
                <option value="{{ Auth::guard('customer')->user()->area }}">{{ Auth::guard('customer')->user()->area }}</option>
                @foreach($result as $result)
                      <option value="{{ $result->area_name }}">{{ $result->area_name }}</option>
                @endforeach

              </select>
            </div>
            <div class="form-group">
              <label for="comment">Address:</label>
              <textarea name="address" required="required" class="form-control" rows="5" >{{ Auth::guard('customer')->user()->address }}</textarea>
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

@endsection
