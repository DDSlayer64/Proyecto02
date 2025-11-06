<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function nuevo(Request $solicitud)
    {
        $user = $solicitud->validate([
            "name"=>"required|string|max:40|min:4",
            "email"=>"required|email|max:40|min:4",
            "DocumentoIdentidad"=>"required|digits_between:6,15",
            "password"=>"required|string|min:8|confirmed"
        ]);

        $createUser =  User::create($user);

        return response()->json(
            [
                'estado'=>'OK',
                'mensaje'=>'Usuario registrado correctamente',
                'user'=>$createUser
            ], 200);
    }
}
