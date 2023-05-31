<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    //protected $table= 'contenidos';

    protected $fillable=[
        'nombre'
    ];
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
