<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable=[
        'nombre',
        'descripcion',
        'color_id',
        'tipo_item_id',
        'contenido_id'
    ];

    public function tipo_item()
    {
        return $this->belongsTo(TipoItem::class);
    }
    public function marcas()
    {
        return $this->belongsToMany(Marca::class);
    }
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
    public function contenido()
    {
        return $this->belongsTo(Contenido::class);
    }
    public function proveedores()
    {
        return $this->belongsToMany(Proveedor::class)
                ->withPivot(["cotizado_por", "user_id", "medida_id", "cantidad_producto", "cantidad_medida", "precio_unitario", "fecha_hora_ingreso", "fecha_expiracion"])
                ->withTimestamps();
    }
}