<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
     public function register(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|max:20',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

         $user->save();
         return response()->json([
             'user' => $user,
             'message' => 'Berhasil Daftar!',
         ], 201);
        
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6|max:20',
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user){
            return response()->json([
                'message' => 'Email tidak terdaftar!'
            ], 401);
        }

        if(!Hash::check($request->password, $user->password)){
            return response()->json([
                'message' => 'Password salah!'
            ], 401);
        }

        $token = $user->createToken('authToken')->plainTextToken;

        $response = [
            'message' => 'Berhasil Login!',
            'user' => $user,
            'token' => $token
        ];

        return response()->json($response, 200);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Berhasil Logout !'
        ], 200);
    }

    public function index(){
        $users = User::all();
        if ($users->count() > 0) {
            return response()->json([
                'data' => $users,
                'status' => 200,
                'message' => 'Data User ditampilkan',
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data User tidak ada',
            ], 404);
        }
    }
}