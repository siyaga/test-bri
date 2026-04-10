<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Login;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponse;

class ApiAuthController extends Controller
{
    use ApiResponse;

    public function login(Request $request)
{
    $credentials = $request->only('username', 'password');

    // Attempt login dan generate token
    if (!$token = auth('api')->attempt($credentials)) {
        return $this->errorResponse("Username or password is wrong", 401);
    }

    return $this->successResponse([
        'access_token' => $token,
        'token_type'   => 'bearer',
        'expires_in'   => auth('api')->factory()->getTTL() * 60
    ], 'Login successful');
}
    public function register(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:login',
            'password' => 'required|string|min:6',
        ]);

       if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        }

        $user = Login::create([
        'username' => $request->username,
        'password' => bcrypt($request->password),
        ]);


       return $this->successResponse(null, 'Registration successful', 201);
    }

      public function users(Request $request)
    {
        $query = login::query();

        if ($request->has('username')) {
            $query->where('username', 'like', '%' . $request->username . '%');
        }

        $users = $query->get();

       return $this->successResponse($users, 'List of users retrieved');
    }

}
