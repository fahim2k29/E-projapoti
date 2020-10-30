<!-- Start Topbar -->
<div class="topbar custom-header-bg" style="padding: 7px;">
    <!-- Start row -->
    <div class="row align-items-center custom-margin">
        <!-- Start col -->
        <div class="col-md-12 align-self-center">

            <div class="togglebar">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <div class="menubar">
                            <a class="menu-hamburger" href="javascript:void();">
                                <img src="{{asset('frontend-assets/images/svg-icon/collapse.svg')}}" class="img-fluid menu-hamburger-collapse" alt="collapse">
                                <img src="{{asset('frontend-assets/images/svg-icon/close.svg')}}" class="img-fluid menu-hamburger-close" alt="close">
                            </a>
                        </div>
                    </li>
                    <li class="list-inline-item">
                        <div class="searchbar">
                            <form>
                                <div class="input-group custom-search-radius">
                                    <input type="text" name="search" id="search" class="form-control custom-search-width " placeholder="Search for products..." aria-label="Search" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit" id="button-addon2"><img src="{{asset('frontend-assets/images/svg-icon/search.svg')}}" class="img-fluid" alt="search"></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <li class="list-inline-item">

                        <a href="{{ route('contactUs') }}" class="ml-1 custom-for-mquery" >Help & More</a>


                        @guest('customer')
                             <a href="#" class="ml-3" data-toggle="modal" data-target="#exampleModal">Sign In</a>
                        @else
{{--                            <a href="{{ route('customer.logout') }}" class="ml-3">{{ (Auth::guard('customer')->user()->name) }}</a>--}}
                            <a href="" class="ml-3 dropdown-toggle" data-toggle="dropdown" id="dropdownMenu2" >{{ (Auth::guard('customer')->user()->phone) }}</a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <a class="dropdown-item" href="{{ route('customer.profile') }}">Your Profile</a>
                                <a class="dropdown-item" href="{{ route('customer.orders') }}">Your Orders</a>
                                {{-- <a class="dropdown-item" href="#">Payment History</a> --}}
                                <a class="dropdown-item" href="{{ route('customer.changePassword') }}">Change Password</a>
                                <a class="dropdown-item" href="{{ route('customer.logout') }}">Logout</a>
                            </div>
                        @endguest
                        <a href="{{ url('cart')}}"  class="ml-0"> <i class="fas fa-shopping-cart">
                        <span class="badge badge-red topCart" id="topCart">{{ App\Cart::where('customer_ip', $_SERVER["REMOTE_ADDR"])->count() }}</span></i> </a>
                    </li>


                </ul>
            </div>

        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>
<!-- End Topbar -->




