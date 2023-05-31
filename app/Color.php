<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable=[
        'nombre'
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
