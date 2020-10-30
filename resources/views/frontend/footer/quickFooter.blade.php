
@extends('frontend.layout.master')


@section('content')

    <div class="container-fluid mt-5" style="margin-top: 110px !important;">

        <h3 >{{ $result->title }}</h3>
        {!! $result->description  !!}


    </div>

@endsection

@section('script')

@endsection
