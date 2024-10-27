<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        
        // User::create([
        //     'name' => 'User baru',
        //     'email' => 'user@gmail.com',
        //     'password' => bcrypt('user')
        // ]);

        $data = array(
            'gagal' => ''
        );

        if($request->submit != "") {

            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect('/');
            }else{
                $data['gagal'] = "Email/password salah";
            }
        }

        return view('login', $data);
    }
}
