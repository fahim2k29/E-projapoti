<!-- Special Offers Start -->
<div>
    <h4 class="text-center mt-5 mb-4 custom-h4-font-weight">{{ $sectionTitle->special_offer }}</h4>
</div>
<!-- Special Offers End -->

<!-- Custom Carousel Start -->
<div class="owl-carousel owl-theme">

@foreach($offers as $offer)
    <div class="card mb-3">
            <div class="row no-gutters">
                  <div class="col-md-4">

                      @php $i=1; @endphp

                  @foreach($offer->images as $image)
                      @if($i>0)
                        <img src="{{ asset('images/'.$image->product_image) }}" class="img-fluid w-100 mt-5" style="height: 100px " >
                      @endif
                      @php $i--; @endphp
                  @endforeach

                  </div>
                  <div  class="col-md-8">
                    <div class="card-body ml-3">
                      <h5 class="card-title">{{$offer->name}}</h5>
                      <p class="card-text">{{$offer->title}}</p>
                      <p class="card-text">{{$offer->quantity}}</p>
                      <p class="card-text"><del>৳{{$offer->mrp_price}}</del> <span style="color:red;">৳ {{($offer->mrp_price)-(($offer->mrp_price * $offer->discount_price)/100)}}</span></p>

                        @if($offer->quantity > 0)
                            <a href="{{ url('add/to/cart') }}/{{ $offer->id }}"  type="button" id="singleDetailsCartId" onclick="addToCart({{ $offer->id }})"  class="btn btn-danger add-cart" >Add to cart</a>
                        @else
                            <div class="alert alert-danger">
                                No Product Available
                            </div>
                        @endif

                    </div>
                  </div>
            </div>
    </div>
@endforeach

</div>

<!-- Custom Carousel End -->
