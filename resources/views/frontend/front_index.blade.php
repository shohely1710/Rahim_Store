
@extends('frontend.master')
@section('content')

<!-- Product_page -->
<div class="service">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="title">
                      <h2>our <strong class="black">products</strong></h2>
                      <span>We package the products with best services to make you a happy customer.</span>
                    </div>
            </div>
        </div>

    </div>
</div>





<div class="product-bg border-bottom">
    <div class="product-bg-white">
        <div class="container">
            <div class="row ">
                @foreach($products as $product)
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="product-box" {{ $loop->index == 0 ? 'active' : '' }}>

                      <i><img src="{!!asset('images/products/' .$product->image)!!}" alt="{{$product->title}}"  width="100" /></i>
                    <h3>
                        <a href="/product"><span style="color:black"> {{$product->title}} </span></a>
                    </h3>

                    </div>
                </div>


                @endforeach
            </div>
        </div>
    </div>
</div>


{{--    <end Product_page>--}}






@endsection
