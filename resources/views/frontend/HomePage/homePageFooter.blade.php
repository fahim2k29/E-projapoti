{{--            HomePageFooter Start    --}}


<div class="row mb-5">
    <div class="col-md-9 mt-3">
        <ul class="list-inline">
            <li class="list-inline-item"><i class="fas fa-truck"></i>  1 hour delivery</li>
            <li class="list-inline-item"><i class="fas fa-money-bill-wave"></i> Cash on delivery
            </li>
        </ul>
        <img src="{{asset('images/'.$configuration->company_logo)}}" alt="" style=" height:70px; width:180px;">
        <p class="mt-2">{{ $configuration->company_description }}</p>
        <br>
        <div class="row custom-service-h5">
            <div class="col-md-4">
                <h5 class="text-secondary">{{ $footerMenu->title_one }}</h5>
                <hr>
                <ul class="list-unstyled">
                    <li><a class="text-muted" href="{{ route('contactUs') }}">Contact Us</a></li>

                    @foreach ($quickFooters->where('section', 1) as $page)
                        @if($page->status == 1)
                            <li class="primary-font-2 light-font fontsize-12"> <i class="ion-ios-arrow-right"></i>
                                <a href="{{ route('quickPage.frontView',$page->id) }}"> {{$page->menu}} </a>
                            </li>
                        @endif
                    @endforeach

                    <li><a class="text-muted" href="#"></a></li>

                </ul>
            </div>
            <div class="col-md-4">
                <h5 class="text-secondary">{{ $footerMenu->title_two }}</h5>
                <hr>
                <ul class="list-unstyled">
                    @foreach ($quickFooters->where('section', 2) as $page)
                        @if($page->status == 1)
                        <li class="primary-font-2 light-font fontsize-12"> <i class="ion-ios-arrow-right"></i>
                            <a href="{{ route('quickPage.frontView',$page->id) }}"> {{$page->menu}} </a>
                        </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-md-4">
                <h5 class="text-secondary">{{ $footerMenu->title_three }}</h5>
                <hr>
                <ul class="list-unstyled">
                    @foreach ($quickFooters->where('section', 3) as $page)
                        @if($page->status == 1)
                        <li class="primary-font-2 light-font fontsize-12"> <i class="ion-ios-arrow-right"></i>
                            <a href="{{ route('quickPage.frontView',$page->id) }}"> {{$page->menu}} </a>
                        </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-3 mt-3">
        <ul class="list-inline">
            <li class="list-inline-item custom-footer-icon-margin">Pay With</li>
            <li class="list-inline-item custom-footer-icon-margin"><a href="#"><img class="custom-footer-icon-money" src="{{asset('frontend-assets/images/Amex.webp')}}" alt=""></a></li>
            <li class="list-inline-item custom-footer-icon-margin"><a href="#"><img class="custom-footer-icon-money" src="{{asset('frontend-assets/images/VIsa.webp')}}" alt=""></a></li>
            <li class="list-inline-item custom-footer-icon-margin"><a href="#"><img class="custom-footer-icon-money" src="{{asset('frontend-assets/images/mastercard.webp')}}" alt=""></a></li>
            <li class="list-inline-item custom-footer-icon-margin"><a href="#"><img class="custom-footer-icon-money" src="{{asset('frontend-assets/images/bkash.webp')}}" alt=""></a></li>
            <li class="list-inline-item custom-footer-icon-margin"><a href="#"><img class="custom-footer-icon-money" src="{{asset('frontend-assets/images/COD.webp')}}" alt=""></a></li>
        </ul>
        <div class="row">
            <div class="col-lg-6 col-md-6 custom-col"><a href="#"><img class="img-fluid w-100" src="{{asset('frontend-assets/images/google_play_store.webp')}}" alt=""></a></div>
            <div class="col-lg-6 col-md-6 custom-col"><a href="#"><img class="img-fluid w-100" src="{{asset('frontend-assets/images/app_store.webp')}}" alt=""></a></div>
        </div>
        <h6>Developed by <a href="#">Smart Software Limited</a></h6>
        <ul class="list-inline">
            <li class="list-inline-item custom-footer-icon-margin"><a href="{{ $Configurations->company_social_link_one }}"><img class="custom-footer-icon" src="{{asset('frontend-assets/images/Facebook.webp')}}" alt=""></a></li>
            <li class="list-inline-item custom-footer-icon-margin"><a href="{{ $Configurations->company_social_link_two }}"><img class="custom-footer-icon" src="{{asset('frontend-assets/images/Youtube.webp')}}" alt=""></a></li>
            <li class="list-inline-item custom-footer-icon-margin"><a href="{{ $Configurations->company_social_link_three }}"><img class="custom-footer-icon" src="{{asset('frontend-assets/images/twitter.webp')}}" alt=""></a></li>
            <li class="list-inline-item custom-footer-icon-margin"><a href="{{ $Configurations->company_social_link_four }}"><img class="custom-footer-icon" src="{{asset('frontend-assets/images/Instagram.webp')}}" alt=""></a></li>
        </ul>
    </div>
</div>

{{--            HomePageFooter End    --}}
