<!-- What our clients are saying Start -->
<div class="mb-5">
    <h4 class="text-center my-5 custom-h4-font-weight">{{ $sectionTitle->what_clients_say }}</h4>
    <div class="fadeOut owl-carousel owl-theme">
        @foreach($clientComments as $clientComment)
        <div class="item">
            <img class="rounded-circle img-fluid" style="width:100px" src="{{ asset('images/'.$clientComment->image) }}" >
            <p>{{$clientComment->name}}</p>
            <p>{{$clientComment->desc}}</p>
        </div>
        @endforeach

    </div>
</div>
<!-- What our clients are saying End -->
