<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required',
        ], [
            'email.unique' => 'This email is already registered.'
        ]);
                
        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'message' => 'validation error',
                'data' => $validator->errors()
            ]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $response = [];
        $response['token'] = $user->createToken("MyApp")->accessToken;
        $response['name'] = $user->name;
        $response['email'] = $user->email;
        
        return response()->json([
            'status' => 1,
            'message' => 'User resgistered successfully',
            'data' => $response
        ]);
    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $user = Auth::user();
            $response = [];
            $response['token'] = $user->createToken("MyApp")->accessToken;
            $response['name'] = $user->name;
            $response['email'] = $user->email;
            
            return response()->json([
                'status' => 1,
                'message' => 'User logged in successfully',
                'data' => $response
            ]);

        }
        else
        {
            return response()->json([
                'status' => 0,
                'message' => "User Unauthenticated",
                'data' => null
            ]);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'status' => 1,
            'message' => 'Logged out successfully'
        ]);
    }
}
