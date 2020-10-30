@extends('layouts.app')

@section('content')

    <body class="login-layout">
    <div class="main-container">
        <div class="main-content">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="login-container">
                        <div class="center">
                            <h1>
                                <span class="red">Admin</span>
                                <span class="white" id="id-text2">Panel</span>
                            </h1>
                            <h4 class="blue" id="id-company-text">&copy; Smart Software Limited</h4>
                        </div>

                        <div class="space-6"></div>

                        <div class="position-relative">
                            <div id="login-box" class="login-box visible widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header blue lighter bigger">
                                            <i class="ace-icon fa fa-coffee green"></i>
                                            Please Enter Your Information
                                        </h4>

                                        <div class="space-6"></div>

                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <fieldset>
                                                <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
														</span>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </label>

                                                <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                        </span>
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                     </span>
                                                    @enderror
                                                </label>

                                                <div class="space"></div>

                                                <div class="clearfix">
                                                    <label class="inline">
                                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="remember">
                                                            {{ __('Remember Me') }}
                                                        </label>
                                                    </label>

                                                    <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                                                        <i class="ace-icon fa fa-key"></i>
                                                        <span class="bigger-110">Login</span>
                                                    </button>
                                                </div>

                                                <div class="space-4"></div>
                                            </fieldset>
                                        </form>






                                    </div><!-- /.widget-main -->


                                </div><!-- /.widget-body -->
                            </div><!-- /.login-box -->

                            <!-- /.forgot-box -->

                        </div><!-- /.position-relative -->

                        <div class="navbar-fixed-top align-right">
                            <br />
                            &nbsp;
                            <a id="btn-login-dark" href="#">Dark</a>
                            &nbsp;
                            <span class="blue">/</span>
                            &nbsp;
                            <a id="btn-login-blur" href="#">Blur</a>
                            &nbsp;
                            <span class="blue">/</span>
                            &nbsp;
                            <a id="btn-login-light" href="#">Light</a>
                            &nbsp; &nbsp; &nbsp;
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.main-content -->
    </div><!-- /.main-container -->




@endsection
