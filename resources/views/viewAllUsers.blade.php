@extends('layout')

@section('title')
    All Users
@endsection

@section('content')
<div class="d-block mb-3 mt-2">
    <a href="{{route('users.create')}}" type="submit" class="btn btn-primary btn-sm">Add New</a>
</div>
    <table class="table table-striped table-hover ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>City</th>
                <th>Edit</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->age }}</td>
                    <td>{{ $user->city }}</td>
                    <td>
                    <a href="{{ route('users.show', $user->id)}}" class="btn btn-primary btn-sm">View</a>
                    </td>
                    <td>
                        <a href="{{ route('users.edit', $user->id)}}" class="btn btn-warning btn-sm">Update</a>
                    </td>
                    <td><form action="{{ route('users.destroy', $user->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end mt-4">
        {{$users->links()}}
    </div>
@endsection
