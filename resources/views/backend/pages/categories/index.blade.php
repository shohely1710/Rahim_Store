@extends('backend.layouts.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    Manage Category
                </div>
                <div class="card-body">
                    @include('backend.layouts.partials.message_product')

                    <table class="table table-hover table-striped">
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Category Image</th>
                            <th>Parent Category</th>
                            <th>Action</th>

                        </tr>

                        @foreach($categories as $category)
                            <tr>
                                <td>#</td>
                                <td>{{$category->name}}</td>
                                <td>
                                    <img src="{!!asset('images/categories/' .$category->image)!!}" width="100">
                                </td>

                                <td>
                                    @if($category->parent_id == NULL)
                                        Primary Category
                                    @else
                                        {{$category->parent->name}}
                                    @endif
                                </td>


                                <td><a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-success">Edit</a>
                                    <a href="#deleteModal{{$category->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                                    <span aria-hidden="true">&times;</span>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{!! route('admin.categories.delete', $category->id) !!}"  method="post">
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
