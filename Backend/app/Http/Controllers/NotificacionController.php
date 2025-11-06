<?php

namespace App\Http\Controllers;

use App\Models\Notificacion;
use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    public function index()
    {
        // Listar todas las notificaciones del usuario autenticado
        $notificaciones = Notificacion::where('usuario_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($notificaciones);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'mensaje' => 'required|string',
        ]);

        $notificacion = Notificacion::create([
            'titulo' => $validated['titulo'],
            'mensaje' => $validated['mensaje'],
            'usuario_id' => auth()->id(),
        ]);

        return response()->json($notificacion, 201);
    }

    public function marcarComoLeido($id)
    {
        $notificacion = Notificacion::where('usuario_id', auth()->id())->findOrFail($id);
        $notificacion->update(['leido' => true]);

        return response()->json(['mensaje' => 'Notificación marcada como leída']);
    }

    public function destroy($id)
    {
        $notificacion = Notificacion::where('usuario_id', auth()->id())->findOrFail($id);
        $notificacion->delete();

        return response()->json(['mensaje' => 'Notificación eliminada']);
    }
}
