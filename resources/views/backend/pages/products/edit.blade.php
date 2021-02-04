@extends('backend.layouts.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    Edit Product
                </div>
                <div class="card-body">
                    <form action="{{route('admin.products.update', $product->id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        @include('backend.layouts.partials.message_product')
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$product->title}}">
                            {{--                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="form-label">Description</label>
                            <textarea name="description" rows="8" cols="80" class="form-control">{{$product->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Price</label>
                            <input type="number" class="form-control" name="price" id="exampleInputEmail1" value="{{$product->price}}">
                            {{--                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Quantity</label>
                            <input type="number" class="form-control" name="quantity" id="exampleInputEmail1" value="{{$product->quantity}}">
                            {{--                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Select Category</label>
                            <select class="form-control" name="category_id">
                                <option value="">Please select a category for the product</option>
                                @foreach(App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
                                    <option value="{{ $parent->id }}" {{ $parent->id == $product->category->id ? 'selected': '' }}>{{ $parent->name }}</option>

                                    @foreach(App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $child)
                                        <option value="{{ $child->id }}" {{ $child->id == $product->category->id ? 'selected': '' }}> -----------> {{ $child->name }}</option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Select Brand</label>
                            <select class="form-control" name="brand_id">
                                <option value="">Please select a category for the product</option>
                                @foreach(App\Models\Brand::orderBy('name', 'asc')->get() as $br)
                                    <option value="{{ $br->id }}" {{ $br->id == $product->brand->id ? 'selected' : '' }}>{{ $br->name }}</option>
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

                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
