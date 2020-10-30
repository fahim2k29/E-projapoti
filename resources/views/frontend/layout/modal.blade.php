<!-- Modal Section Start -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title cusom-modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Start Auth Box -->
                <div class="auth-box-right">
                    <div class="card">
                        <div class="card-body">
                            @foreach ($errors->all() as $error)
                                <p class="text-danger">{{ $error }}</p>
                            @endforeach
                            <form method="POST" action="{{ route('customer.login') }}">
                                @csrf

                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" id="username" placeholder="Email *" required>
                                </div>


                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password *" required>
                                </div>
                                <div class="form-row mb-3">

                                    <div class="col-sm-6">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="rememberme" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label font-14" for="rememberme">Remember Me</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="forgot-psw">
                                            <a id="forgot-psw" href="#" class="font-14">Forgot Password?</a>
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-success btn-lg btn-block font-18">Log in Now</button>
                            </form>

                            <div class="login-or">
                                <h6 class="text-muted custom-text-muted">OR</h6>
                            </div>
                            <div class="social-login text-center">
                                <button type="submit" class="btn btn-primary-rgba btn-lg btn-block font-18"><i class="mdi mdi-facebook mr-2"></i>Log in with Facebook</button>
                                <button type="submit" class="btn btn-danger-rgba btn-lg btn-block font-18"><i class="mdi mdi-google mr-2"></i>Log in with Google</button>
                            </div>
                            <p class="mb-0 mt-3">Don't have a account? <a href="{{ route('customer.register') }}">Sign up</a></p>
                        </div>
                    </div>
                </div>
                <!-- End Auth Box -->
            </div>
            <div class="modal-footer">
                <a  href="{{ route('customer.register') }}" class="btn btn-danger  btn-block">Sign Up</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal Section End -->
