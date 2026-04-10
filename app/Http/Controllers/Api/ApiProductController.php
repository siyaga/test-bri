<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MsProduct;

class ApiProductController extends Controller
{
    public function inquiry(Request $request)
    {
        $query = MsProduct::query();

        if ($request->has('namaproduct')) {
            $query->where('namaproduct', 'like', '%' . $request->namaproduct . '%');
        }

        $products = $query->get();

        return response()->json([
            'success' => true,
            'data' => $products,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'namaproduct' => 'required|string|max:255',
            'qty' => 'required|integer|min:0',
        ]);

        $product = MsProduct::create($validated);
        return response()->json(['success' => true, 'data' => $product], 201);
    }

    public function update(Request $request, $id)
    {
        $product = MsProduct::find($id);
        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found'], 404);
        }

        $validated = $request->validate([
            'namaproduct' => 'sometimes|required|string|max:255',
            'qty' => 'sometimes|required|integer|min:0',
        ]);

        $product->update($validated);
        return response()->json(['success' => true, 'data' => $product]);
    }

    public function destroy($id)
    {
        $product = MsProduct::find($id);
        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found'], 404);
        }

        $product->delete();
        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }
}
