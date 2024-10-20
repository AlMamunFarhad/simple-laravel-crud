@extends('layout')

@section('title')
    <h1 class="text-center">Add User</h1>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        placeholder="Name">
                    @error('name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        placeholder="email">
                    @error('email')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('email') is-invalid @enderror" name="password"
                        placeholder="Password">
                    @error('password')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="age">Age</label>
                    <input type="number" class="form-control @error('email') is-invalid @enderror" name="age"
                        placeholder="Your age">
                    @error('age')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="city">City</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="city"
                        placeholder="Your city">
                    @error('city')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <input type="submit" class="btn btn-success btn-sm" value="Submit">
            </form>
        </div>
    @endsection
