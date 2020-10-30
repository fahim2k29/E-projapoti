@extends('frontend.layout.master')


@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Please Verify Your Phone</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('verify') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Code</label>
                                <div class="col-md-6">
                                    <input id="code" type="text" class="form-control" name="code" maxlength="4" minlength="4" size="4" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required autocomplete="code" autofocus>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Verify
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer ">
                        <div class="pull-right">
                            <a href="">Resend Code</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div




@endsection



@section('script')


@endsection
