<?php

namespace App\Http\Controllers;

use App\Models\Casa;
use Illuminate\Http\Request;

class CasasController extends Controller
{
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
        /* $casa = $solicitud->validate([
            'ubicacion'=>'required|string|max:50|min:2',
            'extencion'=>'required|int'
        ]); */

        /* $casaCreada = Casa::create($casa);
 */
        return response()->json(
            [
                'estado'=>'OK',
                'mensaje'=>'Casa Registrado',
                //'bocho'=>$casaCreada
            ]
            , 200);
    }

}
