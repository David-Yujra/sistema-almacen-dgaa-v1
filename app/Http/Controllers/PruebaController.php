<?php

namespace App\Http\Controllers;

use App\Item;
use App\Medida;
use App\TipoItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PruebaController extends Controller
{
    public function ListarMedidaProducto()
    {
        $data = DB::table('medidas')->orderBy('id')->get();
        return response()->json($data);
    }

    public function GuardarListaMedidaProducto(Request $request)
    {
        Medida::create(['nombre' => $request->nombre]);
        return response()->json([
            'code' => 200
        ]);
    }

    public function GuardarListaTipoItemProducto(Request $request)
    {
        $tipoItem=TipoItem::create(['nombre' => $request->nombre]);
        // asignacion de medida
        $tipoItem->medidas()->sync($request->medidas);
        return response()->json([
            'code' => 200
        ]);
    }
    // public function ListarItem()
    // {
    //     $data = Item::with('marcas')->orderBy('id')->get();
    //     return response()->json($data);
    // }

    //////////////////
    public function ListarTipoItemProducto()
    {
        //$data = DB::table('tipo_items')->orderBy('id')->get();
        $data = TipoItem::with('medidas')->orderBy('id')->get();
        return response()->json($data);
    }
    
    public function ListarItem()
    {
        $dataa = Item::with('marcas')->orderBy('id')->get();
        return response()->json($dataa);
    }
}
