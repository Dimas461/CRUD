<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!auth()->attempt($credentials)){
            return response ()->json([
                'massage' => 'Email/Password tidak sesuai'
                ],401);
        }
        $user = auth()-> user();
        return response ()->json([
            'token' => $user->createToken('ApiUser')->plainTextToken,
            'data' => $user
            ]);
    }
}
