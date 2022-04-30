@extends('layouts.master')

@section('content')
<div class="container">
    <p>You received an email from : {{ $contact->name }} </p>
    <br><br>
    <p class="font-weight-bold font-italic">User details: </p>
    <span class="font-weight-bold font-italic">Name: </span>
    {{ $contact->name }}
    <br>
    <br>
    <span class="font-weight-bold font-italic">Email: </span>
    {{ $contact->email }}
    <br>
    <br>
    <span class="font-weight-bold font-italic">Phone: </span>
    {{ $contact->phone }}
    <br>
    <br>
    <span class="font-weight-bold font-italic">Message: </span>
    {{ $contact->message }}
    <br>
    <br>
    <span class="font-weight-bold font-italic">Send at: </span>
    {{ $contact->created_at }}
    <br>
    <br>

</div>




@endsection