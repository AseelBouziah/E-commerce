@extends('layouts.master')

@section('content')

<section id="container" class="">
        <section id="main-content">
            <section class="wrapper">
     
                <div class="content-box-large">
                    <h1>Products</h1>
                    <table class="table table-striped">
                        <thead>
                          <tr>
                                <th>Image</th>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Product Code</th>
                                <th>Product Price</th>
                                <th>Product Distinctive</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form enctype="multipart/form-data"> 
                            @foreach($products as $product)

                            <tr>
                            <td><img src="{{ asset('uploads/'.$product->image_path) }}" style="width:150px"></td>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{ $product->description}}</td>
                                <td>${{ $product->price}}</td>
                                <td>{{ $product->distinctive}}</td>


                           
                                <td>
                                    <a href="{{ route('edit.product', ['id'=> $product->id]) }}" class="btn btn-xs btn-info">Edit</a>
                                    <a  class="btn btn-xs btn-danger" href="{{ route('destroy.product', ['id'=> $product->id]) }}">Delete</a>
                                </td>
                            </tr>
                            @endforeach

                            </form>
                        </tbody>
                    </table>
                </div>
</section>
</section>
</section>




@endsection