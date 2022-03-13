@extends('layouts.master')

@section('content')
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
                    Create Category
                </div>

                <div class="card-body">


                    <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Category Name:</label>
                            <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter name" name="name">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="parent_category">Product image:</label>
                            <input type="file" name="image" placeholder="Choose image" id="image">
                            @error('image')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection