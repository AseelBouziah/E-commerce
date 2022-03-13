@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Products
                </div>
                

                <div class="card-body">
                    

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Product image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->name}}</td>
                                <td>{{ $product->description}}</td>
                                <td>{{ $product->price}}</td>
                                <td><img src="{{ asset('assets/uploads/'.$product->image_path) }}" style="width:150px"></td>

                           
                                <td>
                                    <a href="{{ route('edit_pro', ['id'=> $product->id]) }}" class="btn btn-xs btn-info">Edit</a>
                                    <a  class="btn btn-xs btn-danger" href="#" data-toggle="modal" data-target="#deleteModal">Delete</a>

                                   <!-- <form  style="display: inline-block;">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-xs btn-danger">Delete</button>
                                    </form> -->

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
  <!-- Delete Modal-->
    <form action="" method="POST">
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sure to delete?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Delete" below if you are ready to delete product.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-primary btn-user  login-btn">Delete</button>

                </div>
            </div>
        </div>
    </div>
    </form>
@endsection