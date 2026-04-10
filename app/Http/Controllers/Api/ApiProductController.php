<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\MsProduct;
use App\Traits\ApiResponse;

class ApiProductController extends Controller
{
    use ApiResponse;

    public function inquiry(Request $request)
    {
        $query = MsProduct::query();

        if ($request->has('namaproduct')) {
            $query->where('namaproduct', 'like', '%' . $request->namaproduct . '%');
        }

        $products = $query->get();

       return $this->successResponse($products, 'List of products retrieved');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'namaproduct' => 'required|string|max:255',
            'qty' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        }

        $product = MsProduct::create($validator->validated());
        return $this->successResponse($product, 'Product created successfully', 201);
    }

    public function update(Request $request, $id)
    {
        $product = MsProduct::find($id);
        if (!$product) {
            return $this->errorResponse('Product not found', 404);
        }

       $validator = Validator::make($request->all(), [
            'namaproduct' => 'sometimes|required|string|max:255',
            'qty'         => 'sometimes|required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        }

        $product->update($validator->validated());
        return $this->successResponse($product, 'Product updated successfully');
    }

    public function destroy($id)
    {
        $product = MsProduct::find($id);
        if (!$product) {
            return $this->errorResponse('Product not found', 404);
        }

        $product->delete();
        return $this->successResponse(null, 'Product deleted successfully');
    }
}
