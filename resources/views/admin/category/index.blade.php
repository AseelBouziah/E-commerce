@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    
                    Categories

                </div>
                

                <div class="card-body">
                    
                   
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Category image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form enctype="multipart/form-data"> 
                            @foreach($categories as $category)

                            <tr>
                                <td>{{$category->name}}</td>
                                <td><img src="{{ asset('assets/uploads/'.$category->image_path) }}" style="width:150px"></td>

                           
                                <td>
                                    <a href="{{ route('edit', ['id'=> $category->id]) }}" class="btn btn-xs btn-info">Edit</a>
                                    <a  class="btn btn-xs btn-danger" href="#" data-toggle="modal" data-target="#deleteModal">Delete</a>
                                </td>
                            </tr>
                            @endforeach

                            </form>
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
                <div class="modal-body">Select "Delete" below if you are ready to delete category.</div>
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