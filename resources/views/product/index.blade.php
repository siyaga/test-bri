@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Products</h3>
        <a href="{{ route('ms_product.create') }}" class="btn btn-primary">Add Product</a>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->namaproduct }}</td>
                <td>{{ $product->qty }}</td>
                <td>
                    <a href="{{ route('ms_product.edit', $product->id) }}" class="btn btn-primary" style="padding: 4px 8px; font-size: 12px; margin-right: 5px;">Edit</a>
                    <form action="{{ route('ms_product.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="padding: 4px 8px; font-size: 12px;" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
