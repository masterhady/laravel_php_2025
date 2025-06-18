@extends('students.home')

@section('tab_name')
Edit Teacher
@endsection

@section('title')
Edit Teacher
@endsection

@section('content')
{{-- // html --> method post/get --> degault get  --}}
{{-- action --> submit --}}
        <form method="POST" action="{{route('teachers.update', $myteacher->id)}}">
            @csrf 
            {{-- generate token laravel make sure data from application --}}
            @method('PUT')  
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name"
             value={{$myteacher->name}}>
        </div>
        <div class="mb-3">
            <label class="form-label">Info</label>
            <input type="text" class="form-control" name="info" value={{$myteacher->info}}>
        </div>

        <div class="mb-3">
            <label class="form-label">age</label>
            <input type="number" class="form-control" name="age" value={{$myteacher->age}}>
        </div>

        <div class="mb-3">
            <label class="form-label">Salary</label>
            <input type="number" class="form-control" name="salary" 
            value="{{$myteacher->salary}}">
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="text" class="form-control" name="image" value="{{$myteacher->photo}}">
        </div>

         <div class="mb-3">
            <label class="form-label">Courses</label>
            <input type="text" class="form-control" name="courses" value="{{$myteacher->courses}}">
        </div>
         <div>
            <label class="form-label"> Department </label>
            <select class="form-select" name="department_id">
                {{-- // department list --}}
                @foreach ($departments as $department)
                    <option value="{{$department->id}}"> {{$department->name}} </option>
                @endforeach
            </select>
        </div>
       
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>



@endsection