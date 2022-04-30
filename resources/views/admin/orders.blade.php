@extends('layouts.master')
@section('content')
<section id="container" class="">
        <section id="main-content">
            <section class="wrapper">
     
                <div class="content-box-large">
                    <h1>Orders</h1>
                    <table class="table table-striped">
                        <thead>
                          <tr>
                                <th>Order ID</th>
                                <th>Order Date</th>
                                <th>Total Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form enctype="multipart/form-data"> 
                            @foreach($orders as $order)

                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->total_price}}</td>

                           
                                <td>
                                    <a href="{{ route('view', ['id'=> $order->id]) }}" class="btn btn-xs btn-info">View</a>
                                    <a  class="btn btn-xs btn-danger" href="{{ route('delete', ['id'=> $order->id]) }}">Delete</a>
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