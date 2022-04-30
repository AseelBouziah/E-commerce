@extends('layouts.master')

@section('content')

<section id="container" class="">
        <section id="main-content">
            <section class="wrapper">
     
                <div class="content-box-large">
                    <h1>Contacts</h1>
                    <table class="table table-striped">
                        <thead>
                          <tr>
                                <th>Email</th>
                                <th>Send At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form enctype="multipart/form-data"> 
                            @foreach($contacts as $contact)

                            <tr>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->created_at}}</td>
                                <td>
                                    <a  class="btn btn-xs btn-danger" href="#" data-toggle="modal" data-target="#deleteModal">Delete</a>
                                    <a  class="btn btn-xs btn-success" href="{{ route('contact.details',['id'=> $contact->id])}}">View</a>

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