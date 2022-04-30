@extends('layouts.nav')
@section('content')
<link href="{{ asset('css/myStyle.css') }}" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous" />
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
</script>

<body style="background-color: #76D7C4;">

    <div>
        <div class="row">
            <div class="col-4">
                <form class="list p-3 mt-2 mb-2">
                    <h1>Product Groups</h1>
                    <div class="btn-group-vertical">
                        @foreach($parents as $parent)
                        <div class="btn-group dropright">
                            <button type="button" class="btn">
                                {{$parent->parent_category}}
                            </button>
                            <button type="button" class="btn
                                   dropdown-toggle
                                   dropdown-toggle-split" data-toggle="dropdown"></button>
                            <div class="dropdown-menu">
                                @foreach($categories as $category)
                                <a class="dropdown-item" href="{{ route('all.product',['id'=> $category->id]) }}">{{$category->category}}</a>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                </form>
            </div>

            <div class="col-8">

                <form class="list pt-5 pb-5 mt-2 mb-2">
                    <section class="pt-5 pb-5">
                        <div class="container">
                            <div class="row">

                                <div class="col-6">
                                    <h3 class="mb-3">All Products</h3>
                                </div>



                                <div class="col-12">
                                    <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

                                        <div class="carousel-inner">
                                            <div class="carousel-item active">

                                                <div class="row">
                                                    @foreach($products as $product)

                                                    <div class="col-md-4 mb-3">
                                                        <div class="card" style="height: 380px;">
                                                            <a href="{{ route('details',['id'=> $product->id]) }}"><img class="img-fluid img" alt="100%x280" src="{{ asset('uploads/'.$product->image_path) }}"></a>
                                                            <div class="card-body">
                                                                <h4 class="card-title">{{ $product->name}}</h4>
                                                                <p class="card-text">${{ $product->price}}</p>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    @endforeach

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </section>
                </form>

            </div>
        </div>
    </div>




</body>
@endsection