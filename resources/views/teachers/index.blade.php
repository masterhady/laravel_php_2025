@extends('students.home')

@section('tab_name')
Teachers List
@endsection

@section('title')
Teachers List
@endsection

@section('content')
<a class="btn btn-primary" href={{route('teachers.create')}}> Create New Teacher </a>
    @foreach ($my_teachers as $teacher)
        <div class="card mb-3" style="max-width: 240px;">
            <div class="card-body">
                <h5 class="card-title">{{ $teacher->name }}</h5>
                <p>Salary: {{ $teacher->salary }}</p>
                <p>Age: {{ $teacher->age }}</p>
                <img src={{ asset('images/'.$teacher->photo) }} width='100px' alt="">
                <a class="btn btn-warning" href={{route('teachers.show', $teacher->id)}}>  View Details </a>
                        
                <a class="btn btn-danger" href={{route('teachers.delete', $teacher->id)}}>  Delete </a>
            
    </div>
        </div>
        
    @endforeach

@endsection