<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function change(Request $request)
    {
        $request->validate([
            'old_password'=>'required|string',
            'password'=>'required|string|min:8|confirmed',
        ]);
        $user = $request->user();

        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json(['old_password'=>['Senha atual incorreta']], 400);
        }

        $user->password=Hash::make($request->password);
        $user->save();

        return response()->json(['message'=>'Senha alterada com sucesso']);
    }
}
