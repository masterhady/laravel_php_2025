@extends('students.home')

@section('tab_name')
Edit Department
@endsection

@section('title')
Edit Department
@endsection

@section('content')
        <form method="POST" action="{{route('departments.update', $department->id)}}">
            @csrf 
            {{-- generate token laravel make sure data from application --}}
            @method('PUT')  
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name"
             value={{$department->name}}>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" class="form-control" name="description" 
            value={{$department->description}}>
        </div>

        
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>



@endsection