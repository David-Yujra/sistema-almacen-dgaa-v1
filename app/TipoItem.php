<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoItem extends Model
{
    //protected $table= 'tipo_items';

    protected $fillable=[
        'nombre'
    ];

    // public function items()
    // {
    //     return $this->belongsTo('App\Item');
    // }

    public function medidas()
    {
        return $this->belongsToMany(Medida::class)->withTimestamps();
    }
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}