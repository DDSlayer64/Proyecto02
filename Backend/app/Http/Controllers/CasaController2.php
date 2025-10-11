<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Casa;


class CasaController2 extends Controller
{
    //
    public function pruebas(Request $solicitud){
        return response()->json([
            'datos'=>$solicitud->ubicacion
        ], 200);
    }


    /**
     * Permite obtener el listado completo de Bichos de la base de datos
     */
    public function verCasas()
    {
        $casas = Casa::all();

        return response()->json(
            [
                'estado'=>'OK',
                'mensaje'=>'Listado de Casas',
                'casas'=> $casas
            ],
            200
        );
    }

     /**
      * Permite agregar un bicho a la base de datos
      */
    public function nueva(Request $solicitud)
    {
        $casa = $solicitud->validate([
            'ubicacion'=>'required|string|max:50|min:2',
            'extencion'=>'required|int'
        ]);

        $casaCreada = Casa::create($casa);
        return response()->json(
            [
                'estado'=>'OK',
                'mensaje'=>'Casa Registrado',
                //'bocho'=>$casaCreada
            ]
            , 200);
    }

}
