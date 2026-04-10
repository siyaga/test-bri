@extends('layouts.app')

@section('content')
<div class="card" style="max-width: 600px; margin: 0 auto;">
    <div class="card-header">
        <h3>Register New User</h3>
        <a href="{{ route('users.index') }}" class="btn btn-primary" style="background: var(--text-muted);">Back</a>
    </div>
    
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required value="{{ old('username') }}">
            @error('username') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
            @error('password') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
@endsection
