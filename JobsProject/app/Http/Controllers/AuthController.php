<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //Register Validation
    public function register(Request $request) {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
            // 'phone' => 'string'
        ]);
        //Store a new user in db
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            // 'phone' => $fields['phone']
        ]);

        // Create token
        $token = $user->createToken('myAppToken')->plainTextToken;
        // Response
        $response = [
            'user' =>$user,
            'token' => $token
        ];
        return response($response, 201);
    }
    public function logout(){
        auth()->user()->tokens()->delete();
        // return [
        //     "message" => "Logged out"
        // ];
        return response("You logged out");
    }

    public function login(Request $request) {

        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        // Check email
        $user = User::where('email', $fields['email'])->first();
        if(!$user || !Hash::check($fields['password'], $user->password) ) {

            return response ([
                "Message" => "FALSE RUN",
            ],  401);
        }
        $token = $user->createToken('myAppToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
        // return response($response, 200);
        return response([$response, "message" => "You have logged in successfully"]);
    }
}

