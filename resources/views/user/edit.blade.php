@extends('layouts.app')

@section('content')
<div class="card" style="max-width: 600px; margin: 0 auto;">
    <div class="card-header">
        <h3>Edit User</h3>
        <a href="{{ route('users.index') }}" class="btn btn-primary" style="background: var(--text-muted);">Back</a>
    </div>
    
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
            @error('username') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label>New Password (leave blank to keep current password)</label>
            <input type="password" name="password" class="form-control">
            @error('password') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
