<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medida extends Model
{
    //protected $table= 'medidas';

    protected $fillable=[
        'nombre'
    ];
    public function tipo_items()
    {
        return $this->belongsToMany(TipoItem::class)->withTimestamps();
    }
    
}
