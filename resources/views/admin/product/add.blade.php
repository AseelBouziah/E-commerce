@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

@if(session()->has('fail'))
    <div class="alert alert-success">
        {{ session()->get('fail') }}
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Create Product
                </div>

                <div class="card-body">
                    

                    <form action="{{ route('store_pro') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name"><strong>Product Name:</strong></label>
                            <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter name" name="name">
                            @error('name')
                               <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name"><strong>Description:</strong></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3"></textarea>
                            @error('description')
                               <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name"><strong>Price:</strong></label>
                            <input type="name" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Enter price" name="price">
                            @error('price')
                               <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                        <label for="parent_category"><strong>image:</strong></label>
                        <br>
                        <input type="file" name="image" placeholder="Choose image" id="image">
                         @error('image')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                         @enderror
                        </div>
          
                        <div class="form-group">
                         <label><strong>Parent Category :</strong></label><br>
                           @foreach($categories as $category)
                                <label><input type="checkbox" name="parent[]" value="{{ $category->id }}"> {{ $category->name }}</label>
                            @endforeach
                        </div> 

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


