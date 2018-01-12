@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('styles')
<style>
    .thumbnail img {
        max-height: 150px;
    }
    .thumbnail .description {
        color: #606060;
    }
    .price {
        font-weight: bold;
        font-size: 15px;
    }
</style>
@endsection

@section('content')
    @foreach($products->chunk(3) as $productChunk)
        <div class="row">
            @foreach($productChunk as $product)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{ $product->imagepath }}" alt="..." class="img-responsive">
                        <div class="caption">
                            <h3>{{ $product->title }}</h3>
                            <p class="description">{{ $product->description }}</p>
                            <div class="clearfix">
                                <p class="pull-left price">${{ $product->price }}</p>
                                <p><a href="#" class="btn btn-success pull-right" role="button">Add to Cart</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection