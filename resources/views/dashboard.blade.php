@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Dashboard Overview</h3>
    </div>
    <div style="display: flex; gap: 20px;">
        <div style="flex: 1; background: #eff6ff; padding: 25px; border-radius: 8px; text-align: center; border: 1px solid #bfdbfe;">
            <h4 style="margin: 0 0 10px 0; color: #1e3a8a;">Registered Users</h4>
            <div style="font-size: 48px; font-weight: bold; color: #2563eb;">{{ $userCount }}</div>
        </div>
        <div style="flex: 1; background: #f0fdf4; padding: 25px; border-radius: 8px; text-align: center; border: 1px solid #bbf7d0;">
            <h4 style="margin: 0 0 10px 0; color: #14532d;">Total Products</h4>
            <div style="font-size: 48px; font-weight: bold; color: #16a34a;">{{ $productCount }}</div>
        </div>
    </div>
</div>
@endsection
