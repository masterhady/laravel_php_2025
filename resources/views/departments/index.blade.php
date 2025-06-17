@extends('students.home')

@section('tab_name')
Departments List
@endsection

@section('title')
Departments List
@endsection

@section('content')
    <div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <a class="btn btn-primary" href={{route('departments.create')}}>
                <i class="fas fa-plus"></i> Create New Department
            </a>
        </div>
    </div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                    <tr>
                        <td>{{ $department->name }}</td>
                        <td>{{ $department->description }}</td>
                        <td>
                            <a class="btn btn-outline-primary" href="{{ route('departments.show', $department->id) }}"> Show </a>
                            <a class="btn btn-outline-warning" href="{{ route('departments.edit', $department->id) }}"> Edit </a>

                            <form method="post" action="{{ route('departments.destroy', $department->id) }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-outline-danger"> Delate </button> 
                            </form>
{{--  unsuported method --}}
                            {{-- <a class="btn btn-outline-danger" href="{{ route('departments.destroy', $department->id) }}"> Delete </a>  
                                 --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        
    </div>
@endsection