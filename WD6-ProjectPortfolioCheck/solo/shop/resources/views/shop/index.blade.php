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
    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="https://images-na.ssl-images-amazon.com/images/I/71Ui-NwYUmL.jpg" alt="..." class="img-responsive">
                <div class="caption">
                    <h3>Thumbnail label</h3>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <div class="clearfix">
                        <p class="pull-left price">$12</p>
                        <p><a href="#" class="btn btn-success pull-right" role="button">Add to Cart</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="https://images-na.ssl-images-amazon.com/images/I/71Ui-NwYUmL.jpg" alt="..." class="img-responsive">
                <div class="caption">
                    <h3>Thumbnail label</h3>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <div class="clearfix">
                        <p class="pull-left price">$12</p>
                        <p><a href="#" class="btn btn-success pull-right" role="button">Add to Cart</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="https://images-na.ssl-images-amazon.com/images/I/71Ui-NwYUmL.jpg" alt="..." class="img-responsive">
                <div class="caption">
                    <h3>Thumbnail label</h3>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <div class="clearfix">
                        <p class="pull-left price">$12</p>
                        <p><a href="#" class="btn btn-success pull-right" role="button">Add to Cart</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="https://images-na.ssl-images-amazon.com/images/I/71Ui-NwYUmL.jpg" alt="..." class="img-responsive">
                <div class="caption">
                    <h3>Thumbnail label</h3>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <div class="clearfix">
                        <p class="pull-left price">$12</p>
                        <p><a href="#" class="btn btn-success pull-right" role="button">Add to Cart</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="https://images-na.ssl-images-amazon.com/images/I/71Ui-NwYUmL.jpg" alt="..." class="img-responsive">
                <div class="caption">
                    <h3>Thumbnail label</h3>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <div class="clearfix">
                        <p class="pull-left price">$12</p>
                        <p><a href="#" class="btn btn-success pull-right" role="button">Add to Cart</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="https://images-na.ssl-images-amazon.com/images/I/71Ui-NwYUmL.jpg" alt="..." class="img-responsive">
                <div class="caption">
                    <h3>Thumbnail label</h3>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <div class="clearfix">
                        <p class="pull-left price">$12</p>
                        <p><a href="#" class="btn btn-success pull-right" role="button">Add to Cart</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection