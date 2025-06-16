<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $r)
    {
        $data = $r->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return response()->json(['message' => 'Usuário criado'], 201);
    }

    public function login(Request $r)
    {
        $r->validate(['email'=>'required|email','password'=>'required']);

        $user = User::where('email',$r->email)->first();
        if(!$user || !Hash::check($r->password,$user->password))
            return response()->json(['message'=>'Credenciais inválidas'],401);

        $token = $user->createToken('spa')->plainTextToken;
        return response()->json(['token'=>$token,'user'=>$user]);
    }

    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();
        return response()->noContent();
    }
}
