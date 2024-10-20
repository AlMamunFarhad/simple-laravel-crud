@extends('layout')

@section('title')
{{-- <h1 class="text-center"> --}}
    User Details

{{-- </h1> --}}
@endsection

@section('content')
<table class="table table-striped table-hover ">
    {{-- <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>City</th>
        </tr>
    </thead> --}}
    <tbody>
        {{-- @foreach ($users as $user) --}}
        <tr>
            <th>ID : </th>
            <td>{{ $users->id }}</td>
        </tr>
        <tr>
            <th>Name : </th>
            <td>{{ $users->name }}</td>
        </tr>
        <tr>
            <th>Email : </th>
            <td>{{ $users->email }}</td>
        </tr>
        <tr>
            <th>Age : </th>
            <td>{{ $users->age }}</td>
        </tr>
        <tr>
            <th>City : </th>
            <td>{{ $users->city }}</td>
        </tr>
        {{-- @endforeach --}}
    </tbody>
</table>
<div class="d-block">
    <a href="{{ route('users.index')}}">Back</a>
</div>
@endsection