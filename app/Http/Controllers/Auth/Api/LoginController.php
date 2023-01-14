<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!auth()->attempt($credentials))
            abort(401, 'Invalid Credentials');

        $token = auth()->user()->createToken('auth_token');
        
        $userData = User::where('email', $credentials['email'])->get(['id', 'name', 'email']);

        return response()
                    ->json([
                        'data' => [
                            'token' => $token->plainTextToken,
                            'loggedUser' => $userData
                        ]
                    ]);
    }

    public function logout()
    {
        //auth()->user()->tokens()->delete();
        auth->user()->currentAccessToken()->delete(); // remove apenas o token da requisição atual
        
        return response()->json([], 204);
    }
}
