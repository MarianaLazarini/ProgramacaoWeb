<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function reset(Request $request)
    {
        $request->validate([
            'token'=>'required',
            'email'=>'required|email',
            'password'=>'required|string|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email','password','password_confirmation','token'),
            fn($user,$password)=>$user->forceFill([
                'password'=>Hash::make($password),
                'remember_token'=>Str::random(60)
            ])->save(),
        );

        return $status === Password::PASSWORD_RESET
            ? response()->json(['message'=>'Senha redefinida com sucesso'])
            : response()->json(['email'=>[__($status)]], 400);
    }
}
