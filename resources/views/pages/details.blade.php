@extends('layouts.nav')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<div class="container m-5 p-5">
    <div class="row">
        <div class="col-6">
            <img class="img-fluid img" alt="100%x280" src="{{ asset('uploads/'.$product->image_path) }}">
        </div>
        <div class="col-6 mt-5">
            <h1>{{$product->name}}</h1>
            <h2>${{$product->price}}</h2>
            <p class="descript">{{$product->description}}</p>

            <div class="buttons d-flex flex-row">
                <div class="cart"></div> <a href="{{ route('cart.store', $product->id) }}" class="btn btn-info cart-button px-5">Add to cart </a>
            </div>
        </div>

    </div>
</div>
@endsection