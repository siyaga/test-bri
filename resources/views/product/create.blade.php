@extends('layouts.app')

@section('content')
<div class="card" style="max-width: 600px; margin: 0 auto;">
    <div class="card-header">
        <h3>Add New Product</h3>
        <a href="{{ route('ms_product.index') }}" class="btn btn-primary" style="background: var(--text-muted);">Back</a>
    </div>
    
    <form action="{{ route('ms_product.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Product Name</label>
            <input type="text" name="namaproduct" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Quantity</label>
            <input type="number" name="qty" class="form-control" required min="0">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
