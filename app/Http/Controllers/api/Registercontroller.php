<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class Registercontroller extends Controller
{
   
    public function __invoke(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3|max:10|',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);

        $user = User::create([
            "name" => $request ->name,
            "email"=> $request ->email,
            "password" => bcrypt($request -> password)
            ]);
            $token = $user->createToken("ApiUser")->plainTextToken;
            return response()->json([
                'user' => $user,
                'token'=> $token,
            ]);
    }
}



