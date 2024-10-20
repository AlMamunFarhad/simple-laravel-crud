@extends('layout')

@section('title')
    <h1 class="text-center">Update User</h1>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-2">
                    <label for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ $user->name }}">
                    @error('name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ $user->email }}">
                    @error('email')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                        value="{{ $user->password }}">
                    @error('password')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="age">Age</label>
                    <input type="number" class="form-control @error('age') is-invalid @enderror" name="age"
                        value="{{ $user->age }}">
                    @error('age')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="city">City</label>
                    <input type="text" class="form-control @error('city') is-invalid @enderror" name="city"
                        value="{{ $user->city }}">
                    @error('city')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="update-dtn mt-4">
                    <input type="submit" value="Submit" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
@endsection
