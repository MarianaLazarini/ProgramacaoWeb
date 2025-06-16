<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class PasswordController extends Controller
{
    public function sendResetLink(Request $r)
    {
        $r->validate(['email'=>'required|email']);
        // Em produção aqui você enviaria o e-mail
        return response()->json(['message'=>'Link enviado (mock)']);
    }

    public function change(Request $r)
    {
        $data = $r->validate([
            'current_password' => 'required',
            'password'         => 'required|confirmed|min:6',
        ]);

        if(!Hash::check($data['current_password'],$r->user()->password))
            throw ValidationException::withMessages(['current_password'=>'Senha atual incorreta']);

        $r->user()->update(['password'=>Hash::make($data['password'])]);
        return response()->json(['message'=>'Senha alterada']);
    }
}
