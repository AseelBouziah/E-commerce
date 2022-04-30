@extends('layouts.nav')
@section('content')
<link href="{{ asset('css/myStyle.css') }}" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>



<body style="background-color: #76D7C4;">
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="{{ asset('images/makeup.jpg') }}" class="image" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="{{ asset('images/skin.jpg') }}" class="image" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/care.jpg') }}" class="image" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="p-3">
        <div class="row">
            <h1 class="text-center p-3">Welcome to For You website</h1>



            <div class="col-12">
                <form class="list p-3 mt-2 mb-2">
                    <div class="row">

                        <div class="col-4 zoom">
                            <img src="{{ asset('images/skinCare.jpg') }}" class="image" alt="...">

                        </div>
                        <div class="col-4">
                            <h1 class="mt-5">THE PERFUME</h1>
                            <p>We have the experience of selling perfumes. Our staff are trained and
                                developed so that they are the most knowledgeable sales advisors
                                within the perfume industry and we can even boast about having the
                                largest number of fragrance graduates nationwide.</p>

                        </div>
                        <div class="col-4 zoom">
                            <img src="{{ asset('images/cosmetics.jpg') }}" class="image" alt="...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <h1 class="ml-5 mt-5">FACE CARE</h1>
                            <p> We’re here to help people achieve the best possible look, with honest products
                                we stand behind and a shopping experience as easy-to-use as our skincare.</p>

                        </div>
                        <div class="col-4 zoom">
                            <img src="{{ asset('images/perfume.jpg') }}" class="image" alt="...">
                        </div>
                        <div class="col-4">
                            <h1 class="ml-5 mt-5">COSMETICS</h1>
                            <p> We’re here to help people achieve the best possible look, with honest products
                                we stand behind and a shopping experience as easy-to-use as our skincare.</p>
                        </div>
                    </div>
                </form>
                <h1 class="text-center p-3">About Us</h1>

                <div class="row p-3">
                    <div class="col-6 list">
                        <video width="100%" height="100%" controls>
                            <source src="movie.mp4" type="video/mp4">
                            <source src="movie.ogg" type="video/ogg">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="col-6 list">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
                <h1 class="text-center p-3">Our Featured Products</h1>
                <div class="row">
                    <div class="col-4">
                        <img src="{{ asset('images/banners.jpg') }}" class="image3" alt="...">

                    </div>

                    <div class="col-8">
                        <div class="row">
                            @foreach($products as $product)
                            <div class="col-4 p-1">
                                <div class="card" style="height: 380px;">
                                    <a href="{{ route('details',['id'=> $product->id]) }}"><img class="img-fluid img" alt="100%x280" src="{{ asset('uploads/'.$product->image_path) }}"></a>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name}}</h5>
                                        <p class="card-text">${{ $product->price}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>

                    </div>
                </div>
                <h1 class="text-center p-3">Categories Products</h1>
                <div class="p-3">
                    <div class="row justify-content-center">
                        @foreach($categories as $category)
                        <div class="col-4 col-sm-3 cat m-1">
                            <a href="{{ route('all.product',['id'=> $category->id]) }}"><h3 class="text-center p-3 text-dark">{{$category->category}}</h3></a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>



</body>
@endsection