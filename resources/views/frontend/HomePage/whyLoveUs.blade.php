<!-- Why People Love Chaldal start -->
<div>
    <h4 class="text-center my-5 custom-h4-font-weight">{{ $sectionTitle->why_love_us }}</h4>

    <div class="row">
    @foreach ($whyPeopleLoves as $whyPeopleLove)
        <div class="col-md-4 custom-bottom-border">
            <img src="{{ asset('images/'.$whyPeopleLove->image) }}"  class="img-fluid w-100"  >
        </div>

        @endforeach
    </div>
</div>

<!-- Why People Love Chaldal end -->
