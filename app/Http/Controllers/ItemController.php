<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function Mostrar()
    {
        $data = Item::with('color', 'contenido', 'tipo_item', 'marcas')->orderBy('id')->get();
        return response()->json($data);
    }
    public function Guardar(Request $request)
    {
        $item=Item::create([
            'nombre' => $request->nombre,
            'descripcion'=> 'nuevo8888',
            'color_id'=> $request->color,
            'tipo_item_id'=>$request->tipoItem,
            'contenido_id'=>$request->contenido
        ]);
        $item->marcas()->sync($request->marca);
        return response()->json([
            'code' => 200
        ]);
    }
}
