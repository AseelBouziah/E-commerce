@extends('layouts.master')

@section('content')

@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

<div class="container mt-3">
    <h2>Edit Product</h2>
    <form action="{{ route('update.product', ['id'=> $product->id]) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PUT">
        <div class="mb-3 mt-3">
            <label for="name"><strong>Product Name:</strong></label>
            <input type="name" class="form-control" id="name" name="name" value="{{ $product->name }}">
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>

        <div class="mb-3">
            <label for="description"><strong>Description:</strong></label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ $product->description}}</textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price"><strong>Price:</strong></label>
            <input type="name" class="form-control" id="price" name="price" value="{{ $product->price }}">
            <span class="text-danger">{{ $errors->first('price') }}</span>
        </div>

        <div class="mb-3">
            <label for="price"><strong>Product image:</strong></label>
            <br>
            <input type="file" name="image" placeholder="Choose image" id="image" value="{{ $product->image_path }}">
            @error('image')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="parent"><strong>Parent Category:</strong></label>
            <br>
            @foreach($categories as $category)
            <label><input type="checkbox" name="parent[]" value="{{ $category->id }}"> {{ $category->category }}</label>
            @endforeach
        </div>

        <div class="mb-3">
            <label for="parent"><strong>Parent Distinctive:</strong></label>
            <br>
            <div class="form-check form-switch">
                <input class="form-check-input" name="status" type="checkbox" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">distinctive</label>
            </div>

        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>

@endsection