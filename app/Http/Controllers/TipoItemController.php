<?php

namespace App\Http\Controllers;

use App\Item;
use App\TipoItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoItemController extends Controller
{
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();

            $tipoItem = TipoItem::create([
                'nombre'=>$request->nombre,
                'descripcion' =>$request->descripcion
            ]);

            Item::create([
                'tipo_item_id'=>$tipoItem->id,
                'nombre'=>$request->nombre,
                'descripcion' =>$request->descripcion
            ]);

            dd($tipoItem);
            
            DB::commit();
            return response()->json(["mensaje" => "TipoItem con Item Registrado"], 201);
            
        }catch(\Exception $e){
            DB::rollBack();
            return 'Se ejecuto un error nuevo';
        }
    }
    public function ObtenerDatos()
    {
        $data = DB::table('items as ite')
        ->join('tipo_items as titem', 'ite.tipo_item_id')
        ->select('ite.id as idite','ite.tipo_item_id', 'ite.nombre as itenombre','ite.descripcion as itedescripcion', 'titem.nombre as tipoitemnombre', 'titem.descripcion as tipoitemdescripcion')
        ->get();
        return $data;
    }
}
