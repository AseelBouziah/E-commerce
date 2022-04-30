@extends('layouts.nav')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<link rel="stylesheet" href="{{asset('css/checkout.css')}}">
<script src="{{asset('js/checkout.js')}}"></script>

<div class="container m-5 p-5">
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
        @php
        Session::forget('success');
        @endphp
    </div>
    @endif
    <h3 class="box-title">Billing Address</h3>
    <hr>
    <form method="get" action="{{route('send',$id)}}" enctype="multipart/form-data">
        <div class="row p-3">
            <div class="col-6">
                <label for="fname">First name<span>*</span></label><br>
                <input id="fname" type="text" name="fname" class="input" value="" placeholder="Your name">
                @if ($errors->has('fname'))
                <span class="text-danger">{{ $errors->first('fname') }}</span>
                @endif
            </div>
            <div class="col-6">
                <label for="fname">Last name<span>*</span></label><br>
                <input id="fname" type="text" name="lname" class="input" value="" placeholder="Your name">
                @if ($errors->has('lname'))
                <span class="text-danger">{{ $errors->first('lname') }}</span>
                @endif
            </div>
        </div>


        <div class="row p-3">
            <div class="col-6">
                <label for="fname">Email Addreess<span>*</span></label><br>
                <input id="fname" type="text" name="email" class="input" value="" placeholder="Your name">
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="col-6">
                <label for="fname">Phone number<span>*</span></label><br>
                <input id="fname" type="text" name="phone" class="input" value="" placeholder="Your name">
                @if ($errors->has('phone'))
                <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
            </div>
        </div>

        <div class="row p-3">
            <div class="col-6">
                <label for="fname">Address<span>*</span></label><br>
                <input id="fname" type="text" name="address" class="input" value="" placeholder="Your name">
                @if ($errors->has('address'))
                <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
            </div>
            <div class="col-6">
                <label for="fname">Country<span>*</span></label><br>
                <input id="fname" type="text" name="contry" class="input" value="" placeholder="Your name">
                @if ($errors->has('contry'))
                <span class="text-danger">{{ $errors->first('contry') }}</span>
                @endif
            </div>
        </div>
        <button class="btn my-3 btn-primary">Send order</button>

    </form>


</div>

@endsection