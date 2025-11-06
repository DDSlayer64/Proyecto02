<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class InfoUController extends Controller
{
    public function verInfo(Request $request)
    {
        $user = $request->user();
        return response()->json([
            'estado' => 'OK',
            'usuario' => $user/* [
                'name' => $user->name,
                'CI' => $user->DocumentoIdentidad,
                'Rol' => $user->Rol

                ] */

        ],200);
    }
}
