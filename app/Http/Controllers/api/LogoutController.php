<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->user()-> currentAccessToken()->delete();
        return response()->json([
            'massage' => 'Succcessfully logged out',
            ]);
    }
}
