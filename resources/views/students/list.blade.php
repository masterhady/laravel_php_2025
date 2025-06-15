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
        </tr>
        @foreach ($myStd as $std)
            <tr>
                <td>{{$std["name"]}}</td>
                <td>{{$std["age"]}}</td>
            </tr>
        @endforeach

    </table>

@endsection