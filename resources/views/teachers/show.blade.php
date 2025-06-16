@extends('students.home')

@section('tab_name')
Teacher Details
@endsection

@section('title')
Teacher Details
@endsection

@section('content')
    <div class="card mb-3" style="max-width: 240px;">
        <div class="card-body">
            <h5 class="card-title">{{ $my_teacher->name }}</h5>
            <p>Salary: {{ $my_teacher->salary }}</p>
            <p>Age: {{ $my_teacher->age }}</p>
            <p>Info: {{ $my_teacher->info }}</p>
            <p>Courses: {{ $my_teacher->courses }}</p>
            <img src="{{ asset('images/'.$my_teacher->photo) }}" width='100px' alt="">
        </div>
    </div>

    <a href="{{ route('teachers.index') }}" class="btn btn-primary">Back to Teachers List</a>

@endsection