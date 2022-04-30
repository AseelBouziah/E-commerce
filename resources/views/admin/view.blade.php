@extends('layouts.master')

@section('content')
<div class="container">
    <p>You received an order from : {{ $order->user_name }} </p>
    <br><br>
    <p class="font-weight-bold font-italic">Order details: </p>
    <span class="font-weight-bold font-italic">Name: </span>
    {{ $order->user_name }}
    <br>
    <br>
    <span class="font-weight-bold font-italic">Address: </span>
    {{ $order->address }}
    <br>
    <br>
    <span class="font-weight-bold font-italic">Phone: </span>
    {{ $order->phone }}
    <br>
    <br>
    <span class="font-weight-bold font-italic">Required product: </span>
    {{ $order->product }}
    <br>
    <br>
    <span class="font-weight-bold font-italic">Quantity: </span>
    {{ $order->quantity }}
    <br>
    <br>
    <span class="font-weight-bold font-italic">Total Price: </span>
    {{ $order->total_price }}
    <br>
    <br>
    <span class="font-weight-bold font-italic">Send at: </span>
    {{ $order->created_at }}
    <br>
    <br>

</div>




@endsection