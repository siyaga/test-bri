<?php

namespace App\Http\Controllers;

use App\Models\MsProduct;
use Illuminate\Http\Request;

class MsProductController extends Controller
{
    public function index()
    {
        $products = MsProduct::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'namaproduct' => 'required|string|max:255',
            'qty' => 'required|integer|min:0',
        ]);

        MsProduct::create($validated);
        return redirect()->route('ms_product.index')->with('success', 'Product created successfully');
    }

    public function edit($id)
    {
        $product = MsProduct::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = MsProduct::findOrFail($id);
        
        $validated = $request->validate([
            'namaproduct' => 'required|string|max:255',
            'qty' => 'required|integer|min:0',
        ]);

        $product->update($validated);
        return redirect()->route('ms_product.index')->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        $product = MsProduct::findOrFail($id);
        $product->delete();
        
        return redirect()->route('ms_product.index')->with('success', 'Product deleted successfully');
    }
}
