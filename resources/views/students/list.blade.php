@extends('students.home')
@section('tab_name')
    List Students
@endsection

@section('title')
    List Students
@endsection

@section('content')
    <table class="table">
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Show</th>
        </tr>
        @foreach ($myStd as $std)
            <tr>
                <td>{{$std["name"]}}</td>
                <td>{{$std["age"]}}</td>
                <td> <a class="btn btn-warning" href="{{route('show', $std['id'])}}"> Show </a> </td> 
                {{-- <td> <a class="btn btn-warning" href="/std/{{$std['id']}}"> Show </a> </td> --}}
            </tr>
        @endforeach

    </table>

@endsection