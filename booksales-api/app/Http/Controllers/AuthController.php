<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Contracts\Providers\JWT;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\JWT as JWTAuthJWT;

class AuthController extends Controller
{
    public function register(Request $request) {
        // Setup validator
        $validator = Validator ::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8'
        ]);

        // Cek validator
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        // Cek keberhasilan
        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'User created successfully',
                'data' => $user
            ], 201);
        }

        // Cek gagal
        return response()->json([
            'success' => false,
            'message' => 'User creation failed',
            'data' => []
        ], 409); // Conflict
    }

    public function login(Request $request) {

        // Setup validator
        $validator = Validator ::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Cek validator
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Get kredensial dari request
        $credentials = $request->only('email', 'password');

        // Cek isFailed
        if (!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau Password Anda Salah!'
            ], 401); // Unauthorized
        }

        // Cek isSuccess
        return response()->json([
            'success' => true,
            'message' => 'Login Successfully',
            'user' => auth()->guard('api')->user(),
            'token' => $token
        ], 200);
    }

    public function logout(Request $request) {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());

            return response()->json([
                'success' => true,
                'message' => 'Logout Successfully'
            ], 200);
        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Logout Failed!'
            ], 500);
        }
    }
}
