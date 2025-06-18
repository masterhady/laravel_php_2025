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
            <a class="btn btn-primary shadow-sm" href={{route('departments.create')}}>
                <i class="fas fa-plus me-2"></i>Create New Department
            </a>
        </div>
    </div>
    
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th scope="col" class="fw-bold">Name</th>
                        <th scope="col" class="fw-bold">Description</th>
                        <th scope="col" class="fw-bold">Department</th>

                        <th scope="col" class="fw-bold text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $department)
                        <tr>
                            <td class="align-middle">{{ $department->name }}</td>
                            <td class="align-middle">{{ $department->description }}</td>
                            <td class="align-middle">{{ $department->user->name }}</td>

                          <td class="text-center">
                                <div class="btn-group gap-2" role="group">
                                    <a class="btn btn-outline-primary btn-sm " href="{{ route('departments.show', $department->id) }}">Show
                                    </a>

                                     @can('manage-department',$department)

                                        <a class="btn btn-outline-warning btn-sm mx-1" href="{{ route('departments.edit', $department->id) }}">Edit
                                        </a>
                                    @else
                                        <a class="btn btn-outline-warning btn-sm mx-1 disabled" href="#">Edit
                                        </a>
                                   
                                    @endcan 
                                        
                                    {{-- // to use gate in views can --}}
                                    @can('manage-department',$department)
                                        <form class="d-inline mx-1" method="post" action="{{ route('departments.destroy', $department->id) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection