@extends('students.home')

@section('tab_name')
Create Teacher
@endsection

@section('title')
Create Teacher
@endsection

@section('content')
        <form method="POST" action="{{ route('teachers.store') }}">
            @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
            
        </div>
        <div class="mb-3">
            <label class="form-label">Info</label>
            <input type="text" class="form-control" name="info">
        </div>

        <div class="mb-3">
            <label class="form-label">age</label>
            <input type="number" class="form-control" name="age">
        </div>

        <div class="mb-3">
            <label class="form-label">Salary</label>
            <input type="number" class="form-control" name="salary">
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="text" class="form-control" name="image">
        </div>

         <div class="mb-3">
            <label class="form-label">Courses</label>
            <input type="text" class="form-control" name="courses">
        </div>
       
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>



@endsection