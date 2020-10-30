
@extends('frontend.layout.master')


@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-8 mt-5">
                <p>Feel free to contact us anytime at {{ $Configuration->company_head_number }}</p>
                <h4 class="custom-h4-font-weight">Contact Us</h4>
                <form action="{{ route('contactus.msg') }}" method="POST">
                    @csrf
                    <div class="form-group">

                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" required="required" class="form-control" value="" id="exampleInputEmail1" aria-describedby="emailHelp" >

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <div class="input-group">
                            <input type="email" class="form-control" required="required" name="email" value="" aria-label="Your Phone" aria-describedby="basic-addon2">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <div class="input-group mb-2">
                            <input type="text" name="phone" maxlength="11" minlength="11" size="11" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required="required" class="form-control" id="inlineFormInputGroup" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="comment">Message</label>
                        <textarea name="message" required="required" class="form-control" rows="5" ></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger btn-lg btn-block">Submit</button>
                    </div>
                </form>

               <h1> Or Call Us :  {{ $Configuration->company_head_number }}  </h1>
            </div>
            <div class="col-md-4">

            </div>
        </div>

    </div>

@endsection

@section('script')

@endsection
