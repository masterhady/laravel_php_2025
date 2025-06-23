<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        // create user  
        // validation 
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password) // as plain text 123 123 
        ]);
            // register --> create token --> verify user authentaced 
        $token = $user->createToken("auth_token")->plainTextToken; // generate token 

        return response()->json([
            "user" => $user, 
            "token" => $token
        ], 201);
    }

    // login 
    public function login(Request $request){
        // verify login data === data db 
            $user = User::where("email", $request->email)->first();  // get the first email == email 
            if(!$user || !Hash::check($request->password, $user->password)){
                return response()->json([
                    "message" => "Invalid Credential"
                ],401);
            }
            $tokens = $user->tokens()->count();

            if($tokens > 3){
                return response()->json([
                    "message" => "You have exceeds the number of logins"
                ], 401);
            }else{
                  $token = $user->createToken("auth_token")->plainTextToken; // generate token 
                return response()->json([
                    "user" => $user, 
                    "token" => $token
                ], 201);
            }
    }

    public function logout(Request $request){
        // token --> delete 
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            "message" => "Logged out Succfully"
        ],200);
    }
}


