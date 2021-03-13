<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        $credentials = request(['email', 'password']);
        $token = Auth::attempt($credentials);

        if(!$token){
            return response()->json('non autorisée', 401);
        }

        return $this->respondWithToken($token);
    }

    public function respondWithToken(string $token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ]);
    }

    public function guard(){
        return Auth::guard();
    }
}
