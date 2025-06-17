@extends('students.home')

@section('tab_name')
Create Teacher
@endsection

@section('title')
Create Teacher
@endsection

@section('content')
        {{-- @dd(error()); --}}
        {{-- // if errors --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif



        <form method="POST" action="{{ route('teachers.store') }}">
            @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" 
            value="{{ old('name') }}"
            name="name" >
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Info</label>
            <input type="text" class="form-control" name="info"  
            value="{{ old('info') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">age</label>
            <input type="text" class="form-control" name="age"
             value="{{ old('age') }}">
            @error('age')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Salary</label>
            <input type="number" class="form-control" name="salary"
             value="{{ old('salary') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="text" class="form-control" name="image"
             value="{{ old('image') }}">
        </div>

         <div class="mb-3">
            <label class="form-label">Courses</label>
            <input type="text" class="form-control" name="courses"
             value="{{ old('courses') }}">
        </div>
       
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>



@endsection