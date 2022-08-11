<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            return response()->json([
                'token' => $user->createToken('api-token')->plainTextToken,
                'user' => $user
            ]);
        } else {
            return response()->json(['message' => 'incorrect password or email'], 401);
        }
    }
    /**
     *  Logout api
     *  @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $user = Auth::user();
       
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
        return response()->json(['message' => 'logged out'], 401);
    }
}
