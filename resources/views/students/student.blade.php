@extends('students.home') 

{{-- <h1 class="text-center text-danger">My student </h1> --}}

@section('tab_name')
    Student
@endsection

@section('title')
   My studdent 
@endsection

@section('content')
    Name: {{$std['name']}} <br>
    Age: {{$std['age']}} <br>
@endsection