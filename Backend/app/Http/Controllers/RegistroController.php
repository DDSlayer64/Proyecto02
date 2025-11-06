<?php

namespace App\Http\Controllers;

//Importacion de clases
use Illuminate\Http\Request; //Permite manejar informacion que llega desde formularios y/opeticiones
use App\Models\User; //Modelo usuario
use Illuminate\Support\Facades\Auth; //Permite manejar autenticacion(inicio de sesion, etc)
use Illuminate\Support\Facades\Hash; //Permite enciptar datos

class RegistroController extends Controller
{

    public function nuevo(Request $solicitud)
    // Definimos una funcion 'nuevo' que recibe un objeto de tipo Request, este objeto $solicitud contiene la informacion de un formulario enviado por el usuario.
    {
        $datos = $solicitud->validate([
            "name"=>"required|string|max:40|min:4",
            "email"=>"required|email|max:40|min:4",
            "DocumentoIdentidad"=>"required|digits_between:6,15",
            'Rol'=>"required|in:Administrador,Empleado",
            "password"=>"required|string|min:8"
        ]);
        //Se validan la informacion y se la almacena en una variable '$dato'

        $datos['password'] = Hash::make($datos['password']);
        //Se encripta la contraseña

        $user =  User::create($datos);
        //Se registra un nuevo usuario en la base de datos

        Auth::login($user);
        //Se autentica al usuario, es decir se inicia sesion

        $solicitud->session()->regenerate();
        //Cambia el ID de la sesion para evitar ataque de tipo "sessinon fixation"

        return response()->json(
            [
                'estado'=>'OK',
                'mensaje'=>'Usuario registrado correctamente',
                'user'=>$user,
                'destino'=>'casas'
            ], 200);
            //Si todo salio bien manda esa respuesta al frontend
    }
}
