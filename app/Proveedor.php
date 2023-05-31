<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $fillable=[
        'nombre_empresa',
        'nombre_proveedor',
        'recursos',
        'celular',
        'ubicacion',
        'correo'

    ];
    public function items()
    {
        return $this->belongsToMany(Item::class)
                ->withPivot(["cotizado_por", "user_id", "medida_id", "cantidad_producto", "cantidad_medida", "precio_unitario", "fecha_hora_ingreso", "fecha_expiracion"])
                ->withTimestamps();
    }
}
