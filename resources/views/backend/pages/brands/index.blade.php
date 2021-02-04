@extends('backend.layouts.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    Manage Brands
                </div>
                <div class="card-body">
                    @include('backend.layouts.partials.message_product')

                    <table class="table table-hover table-striped">
                        <tr>
                            <th>#</th>
                            <th>Brand Name</th>
                            <th>Brand Image</th>
                            <th>Action</th>

                        </tr>

                        @foreach($brands as $brand)
                            <tr>
                                <td>#</td>
                                <td>{{$brand->name}}</td>
                                <td>
                                    <img src="{!!asset('images/brands/' .$brand->image)!!}" width="100">
                                </td>

                                <td><a href="{{route('admin.brands.edit', $brand->id)}}" class="btn btn-success">Edit</a>
                                    <a href="#deleteModal{{$brand->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal{{$brand->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                                    <span aria-hidden="true">&times;</span>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{!! route('admin.brands.delete', $brand->id) !!}"  method="post">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Permanent Delete</button>

                                                    </form>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        @endforeach

                    </table>

                </div>
            </div>
        </div>
    </div>


@endsection
