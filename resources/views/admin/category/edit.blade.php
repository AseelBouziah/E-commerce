@extends('layouts.master')

@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<div class="container mt-3">
  <h2>Edit Category</h2>
  <form action="{{ route('update', ['id'=> $category->id]) }}" method="post">
  {{ csrf_field() }}
    <input name="_method" type="hidden" value="PUT">
    <div class="mb-3 mt-3">
    <label for="name"><strong>Category Name:</strong></label>
    <input type="name" class="form-control" id="name" name="name" value="{{ $category->name }}">
    <span class="text-danger">{{ $errors->first('name') }}</span>
    </div>


    <div class="mb-3">
    <label for="price"><strong>Product image:</strong></label>
    <input type="file" name="image" placeholder="Choose image" id="image" value="{{ $category->image_path }}">
        @error('image')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
    </div>


    <button type="submit" class="btn btn-primary">Edit</button>
  </form>
</div>

@endsection
