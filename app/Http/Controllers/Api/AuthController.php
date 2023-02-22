<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request) {

        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials)) {
            return response()->json([
                "message" => "Invalid email or password"
            ], 401);
        }

        $user = $request->user();

        $token = $user->createToken("Access Token");
        
        $user->access_token = $token->accessToken;

        /*
        $token = auth()->user()->createToken('Personal Access Token')->accessToken;
        return response(['user' => auth()->user(), 'token' => $token]);
        */
        
        return response()->json([
            "user" => $user
        ], 200);
        

    }
    
    public function signup(Request $request) {

        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
        ]);

        $user = new User([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $user->save();

        return response()->json([
            "message" => "User registered successfully"
        ], 201);
    }

    public function logout(Request $request){
        $request->user()->token()->revoke(); 
        return response()->json([
            "message"=>"User logged out successfully"
        ], 200);
    }
    
    public function index() {
        echo "Hello World";
    }

}
