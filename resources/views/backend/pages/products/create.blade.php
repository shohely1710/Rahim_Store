@extends('backend.layouts.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    Add Product
                </div>
                <div class="card-body">
                    <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('backend.layouts.partials.message_product')
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp">
{{--                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="form-label">Description</label>
                            <textarea name="description" rows="8" cols="80" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Price</label>
                            <input type="number" class="form-control" name="price" id="exampleInputEmail1">
{{--                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Quantity</label>
                            <input type="number" class="form-control" name="quantity" id="exampleInputEmail1">
{{--                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Select Category</label>
                            <select class="form-control" name="category_id">
                                <option value="">Please select a category for the product</option>
                                @foreach(App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
                                    <option value="{{ $parent->id }}">{{ $parent->name }}</option>

                                    @foreach(App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $child)
                                        <option value="{{ $child->id }}"> -----------> {{ $child->name }}</option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Select Brand</label>
                            <select class="form-control" name="brand_id">
                                <option value="">Please select a category for the product</option>
                                @foreach(App\Models\Brand::orderBy('name', 'asc')->get() as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="product_image" class="form-label">Product Image</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="file" class="form-control" name="product_image[]" id="product_image">
                                </div>
                                <div class="col-md-4">
                                    <input type="file" class="form-control" name="product_image[]" id="product_image">
                                </div><div class="col-md-4">
                                    <input type="file" class="form-control" name="product_image[]" id="product_image">
                                </div>
                                <div class="col-md-4">
                                    <input type="file" class="form-control" name="product_image[]" id="product_image">
                                </div>
                                <div class="col-md-4">
                                    <input type="file" class="form-control" name="product_image[]" id="product_image">
                                </div>
                                <div class="col-md-4">
                                    <input type="file" class="form-control" name="product_image[]" id="product_image">
                                </div>

                            </div>

                            {{--                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                        </div>

                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
