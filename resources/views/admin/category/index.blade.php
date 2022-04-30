@extends('layouts.master')

@section('content')

<section id="container" class="">
        <section id="main-content">
            <section class="wrapper">
     
                <div class="content-box-large">
                    <h1>Categories</h1>
                    <table class="table table-striped">
                        <thead>
                          <tr>
                                <th>Catgeory ID</th>
                                <th>Catgeory Name</th>
                                <th>Catgeory Parent Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form enctype="multipart/form-data"> 
                            @foreach($categories as $category)

                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->category}}</td>
                                <td>{{$category->parent_category}}</td>

                           
                                <td>
                                    <a href="{{ route('edit', ['id'=> $category->id]) }}" class="btn btn-xs btn-info">Edit</a>
                                    <a  class="btn btn-xs btn-danger" href="#" data-toggle="modal" data-target="#deleteModal">Delete</a>
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