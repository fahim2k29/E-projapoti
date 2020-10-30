<!-- Do you own a business? Start -->
<div class="custom-background-img" style="background-image: url('{{asset('frontend-assets/images/home-office.jpg')}}');">
    <div class="custom-background-img-text">
        <h4 class="text-center text-warning">Do you own a business?</h4>
        <br>
        <span class="text-center text-primary ">Become a Corporate Customer</span>
        <br>
        <br>
        <div class="row">
        @foreach($howToOrders as $howToOrder)
            <div class="col-md-4 custom-img-mquery ">
                <img  class="img-fluid" width="100%" src="{{ asset('images/'.$howToOrder->image) }}" alt="">
            </div>
            @endforeach
        </div>
        <br>
        <div class="btn btn-danger">find out more</div>
    </div>
</div>
<!-- Do you own a business? End -->
