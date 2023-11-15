@extends('layout.app')
@section('title', 'Registration')

@section('content')
    <div>
        @if (session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
    </div>
    <div>
        @if (session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    </div>
    <div class="card ms-auto me-auto mt-3" style="width: 550px">
        <div class="card-header">Registration</div>
        <div class="card-body">
            <form action="{{ route('registration.post') }}" method="POST" class="ms-auto me-auto mt-3" style="width: 500px">
                @csrf
                <div class="mb-3">
                    <label class="form-label">UserName</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        required autocomplete="new-password">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- <div class="mb-3">
                    <label class="form-label"> Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password" required
                        autocomplete="new-password">
                </div> --}}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
