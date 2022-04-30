<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link href="{{ asset('css/detailsStyle.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>

<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top color">
        <div class="container-fluid">
            <a class="navbar-brand" href="/home">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto mb-2 mb-md-0">

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('all.products')}}" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            Products
                        </a>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                    </li>

                </ul>
                <div>
                    <button type="button" class="btn btn-info" data-toggle="dropdown">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="{{ route('cart.list') }}" class="text-dark font-weight-bold"> Cart </a><span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                    </button>

                </div>
                <form class="d-flex">
                    <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search" name="product">
                    <button class="btn btn-primary" type="submit"><a href="{{route('search')}}" class="text-light">Search</a></button>
                </form>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="page-footer mt-auto py-3 bg-light">
        <div class="container-fluid text-center text-md-left">
            <div class="row">
 
                <hr class="clearfix w-100 d-md-none pb-3">
                <div class="col-md-12 mb-md-0 mb-3">
                    <h5 class="text-uppercase">Links</h5>
                            <a class="btn btn-primary m-1" style="background-color: #3b5998;" href="#!" role="button">
                                <i class="fab fa-facebook-f"></i><span class="badge ms-2">Facebook</span>
                            </a>
                       
                        <a class="btn btn-primary m-1" style="background-color: #ac2bac;" href="#!" role="button">
                                <i class="fab fa-instagram"></i><span class="badge ms-2">Instagram</span>
                            </a>
                       
                        
                        <a class="btn btn-primary m-1" style="background-color: #55acee;" href="#!" role="button">
                                <i class="fab fa-twitter ms-3"></i><span class="badge ms-2">Twitter</span>
                            </a>                        
                        
                        <a class="btn btn-primary m-1" style="background-color: #25d366;" href="#!" role="button">
                                <i class="fab fa-whatsapp"></i><span class="badge ms-2">Whatsapp</span>
                            </a>                         
                </div>
            </div>
        </div>
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="/"> MDBootstrap.com</a>
        </div>

    </footer>
    <!-- Footer -->








</body>

</html>