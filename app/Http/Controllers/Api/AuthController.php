<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){

        $request->validate([
            "name"=>"required|string|max:255",
            "email"=>"required|string|email|unique:users",
            "password"=>"required|string|min:8|confirmed",
            "department_id" => "required|exists:departments,id",
            "start_date" => "nullable|date",
            "company_name" => "nullable|string|max:255",
            "role" => "nullable|string"
        ]);

       $user = User::create([
        "name" => $request->name,
        "email" => $request->email,
        "password" => Hash::make($request->password),
        "department_id" => $request->department_id,
        "start_date" => $request->start_date,
        "company_name" => $request->company_name,
        "role" => $request->role ?? 'azubi',
    ]);
        return response()->json([
        "Message" => "User created successfully! Welcome to your department 🚀",
        "user" => $user,
        "token" => $user->createToken("auth_token")->plainTextToken
    ], 201);
    }

    public function login(Request $request){

        $request->validate([
            "email"=>"required|email",
            "password"=>"required"
        ]);

        $user = User::where("email",$request->email)->first();

        if(!$user || !Hash::check($request->password , $user->password)){
            return response()->json([
                "Message"=>"Invalid credentials"
            ],401);
            }
        
        return response()->json([
            "token"=>$user->createToken("auth_token")->plainTextToken,
            'user' => $user
        ]);    
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            "Message"=>"Logged out successfully",
            
        ]);
    }
}
