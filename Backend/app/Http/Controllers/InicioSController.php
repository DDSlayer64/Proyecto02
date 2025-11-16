<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use lluminate\Support\Facades\Auth;
use lluminate\Support\Facades\Hash;

class InicioSController extends Controller
{
    public function login(Request $solicitud)
    {
        $credenciales = $solicitud->validate([


            "DocumentoIdentidad"=> ['required'],
            'password'=>['required']
        ]);

        if (Auth::attempt($credenciales)){
            $solicitud->session()->start();
            $solicitud->session()->regenerate();

            $usuario = $solicitud->user();

            return response()->json(
                [
                    'estado' => 'OK',
                    'mensaje' => 'Inicio de sesion exitoso',
                    'usuario' => $usuario,
                    'destino' => 'Usuario'
                ],
                200
            );
        }
        else {
            return response()->json(
                [
                    'estado' => 'ERROR',
                    'mensaje' => 'Error en el documento de identidado o contraeña',

                ],
                401
                );
        }

    }

    public function cerrarSesion(Request $solicitud){
        Auth::logout();
        $solicitud->session()->flush();
        $solicitud->session()->invalidate();
        $solicitud->session()->regenerateToken();

        return response()->json(
            [
                'estado'=>'Ok',
                'mensaje'=>'Sesion cerrada correcatmente',
                'destino'=>'login',
            ],
            200
        );
    }
}
