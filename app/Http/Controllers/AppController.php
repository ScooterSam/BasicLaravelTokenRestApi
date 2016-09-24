<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function login(Request $request)
    {
        //$request->header(['Content-Type:application/json']);
        $userData = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if(Auth::attempt($userData))
        {
            return response()->json([
                'complete' => 'true',
                'message' => 'Logged in successfully',
                'token' => Auth::user()->api_token
            ]);
        }
        return  response()->json([
            'errors' => 'true',
            'message' => 'Failed to login!'
        ]);
    }

    public function getInfo(Request $request)
    {
        return Auth::guard('api')->user();
    }
}
