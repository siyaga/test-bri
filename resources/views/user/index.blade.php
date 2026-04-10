@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>User Management</h3>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Register New User</a>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Registered At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->created_at ? $user->created_at->format('Y-m-d') : 'N/A' }}</td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary" style="padding: 4px 8px; font-size: 12px; margin-right: 5px;">Edit</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="padding: 4px 8px; font-size: 12px;" onclick="return confirm('WARNING: Are you sure you want to delete this user?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
