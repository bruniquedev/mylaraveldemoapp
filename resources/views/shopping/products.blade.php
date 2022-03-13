@extends('layouts.app') <!--The reason for this is because we this particular layout to belong to views -> layouts -> app.blade.php-->

@section('title', 'Products')

@section('content') 

@include('shopping.header')

<div class="container products">
<div class="row">

            @foreach($products as $product)
                <div class="col-xs-18 col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="{{ asset('images/'.$product->photo) }}" width="100%" height="100%">
                        <div class="caption">
                            <h4>{{ $product->name }}</h4>
                            <p>{{ str_limit(strtolower($product->description), 50) }}</p>
                            <p><strong>Price: </strong> {{ $product->price }}$</p>
                            <p class="btn-holder"><a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div><!-- End row -->
    </div>

    @include('shopping.footer')



@endsection
<!--code above is for templating-->