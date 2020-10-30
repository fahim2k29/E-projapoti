






<!-- Right Content Images Start -->
<div class="row mt-4">
    @foreach($rightContentImg as $rightContentImg)
        <div class="col-md-6 col-sm-6">
            <a href="{{ $rightContentImg->offer_link }}">
                 <img src="{{ asset('images/'.$rightContentImg->image) }}" style="width: 470px; height: 130px" alt="">
            </a>
        </div>
    @endforeach

</div>
<!-- Right Content Images End -->
