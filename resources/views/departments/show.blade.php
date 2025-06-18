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
            <p> Head of Department: {{$department->user->name}}</p>
            <div> 
                <p>Teachers:</p>
                {{-- list all teachers that belongs to this department  --}}
                <ul>
                    @forelse ($department->teachers as $teacher)
                         <li> {{$teacher->name}}</li>
                    @empty
                        <li class="text-danger">No teachers found in this department.</li>
                    @endforelse

                    {{-- @foreach($department->teachers as $teacher)
                        <li> {{$teacher->name}}</li>
                    @endforeach --}}
                </ul>
            </div>
               
        </div>
    </div>

    {{-- <a href="{{ route('teachers.index') }}" class="btn btn-primary">Back to Teachers List</a> --}}

@endsection