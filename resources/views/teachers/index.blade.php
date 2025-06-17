@extends('students.home')

@section('tab_name')
Teachers List
@endsection

@section('title')
Teachers List
@endsection

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <a class="btn btn-primary" href={{route('teachers.create')}}>
                <i class="fas fa-plus"></i> Create New Teacher
            </a>
        </div>
    </div>
    
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
        @foreach ($my_teachers as $teacher)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="text-center pt-3">
                        <img src={{ asset('images/'.$teacher->photo) }} 
                             class="rounded-circle" 
                             style="width: 120px; height: 120px; object-fit: cover;" 
                             alt="{{ $teacher->name }}">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">{{ $teacher->name }}</h5>
                        <div class="text-muted mb-3">
                            <div><i class="fas fa-money-bill-wave me-2"></i>Salary: ${{ number_format($teacher->salary) }}</div>
                            <div><i class="fas fa-user-clock me-2"></i>Age: {{ $teacher->age }}</div>
                        </div>
                        <div class="d-grid gap-2">
                            <a class="btn btn-outline-primary" href={{route('teachers.show', $teacher->id)}}>
                                <i class="fas fa-eye"></i> View Details
                            </a>
                            <a class="btn btn-outline-warning" href={{route('teachers.edit', $teacher->id)}}>
                                <i class="fas fa-trash"></i> Edit
                            </a>
                            <a class="btn btn-outline-danger" href={{route('teachers.delete', $teacher->id)}}>
                                <i class="fas fa-trash"></i> Delete
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection