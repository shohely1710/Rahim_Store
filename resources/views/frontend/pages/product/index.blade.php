@extends('frontend.master')
@section('content')
    <div class="brand_color">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>
                            our product </h2>
                            <ul class="navbar-nav mi-auto">
                                <li>


                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class='container margin-top-20'>
        <div class="row">
            <div class="col-md-4 list-div">
                @include('frontend.partials.product-sidebar')
            </div>

    <div class="col-md-8">
        <div class="widget">
            <h3 class="pro-header">All Products</h3>
            @include('frontend.pages.product.partials.all_products')

        </div>
        <div class="widget">

        </div>
    </div>
        </div>
    </div>


@endsection
