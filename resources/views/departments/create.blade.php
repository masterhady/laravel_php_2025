@extends('students.home')

@section('tab_name')
Create Department
@endsection

@section('title')
Create Department
@endsection

@section('content')


        <form method="POST" action="{{ route('departments.store') }}">
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
            <label class="form-label">Description</label>
            <input type="text" class="form-control" name="description"  
            value="{{ old('description') }}">
        </div>
        @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
       
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>



@endsection