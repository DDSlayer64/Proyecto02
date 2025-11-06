<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    use HasFactory;

    protected $table = 'notificaciones';

    protected $fillable = [
        'titulo',
        'mensaje',
        'leido',
        'usuario_id',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}

if ($producto->cantidad < 5) {
    Notificacion::create([
        'titulo' => 'Stock bajo',
        'mensaje' => "El producto {$producto->nombre} tiene stock bajo ({$producto->cantidad}).",
        'usuario_id' => $usuario->id,
    ]);
}
