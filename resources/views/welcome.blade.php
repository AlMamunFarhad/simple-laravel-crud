@extends('layout')

@section('title')
<h1 class="mb-3">All Students</h1>
@endsection

@section('content')

    <table class="table table-striped table-hover ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>City</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->city_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{$students->links()}}
    </div>    
@endsection