@extends('students.home')

@section('tab_name')
Department Details
@endsection

@section('title')
Department Details
@endsection

@section('content')
    <div class="card mb-3" style="max-width: 240px;">
        <div class="card-body">
            <h5 class="card-title">{{ $department->name }}</h5>
            <p>Info: {{ $department->description }}</p>
        </div>
    </div>

    {{-- <a href="{{ route('teachers.index') }}" class="btn btn-primary">Back to Teachers List</a> --}}

@endsection