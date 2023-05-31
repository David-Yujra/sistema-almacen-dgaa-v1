<?php

namespace App\Http\Controllers;

use App\Color;
use App\Contenido;
use App\Marca;
use App\Medida;
use App\TipoItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListaDesplegableController extends Controller
{
    public function ListarMarcaProducto()
    {
        $data = DB::table('marcas')->orderBy('id')->get();
        return response()->json($data);
    }

    public function ListarContenidoProducto()
    {
        $data = DB::table('contenidos')->orderBy('id')->get();
        return response()->json($data);
    }

    public function ListarColorProducto()
    {
        $data = DB::table('colors')->orderBy('id')->get();
        return response()->json($data);
    }

    public function ListarMedidaProducto()
    {
        $data = DB::table('medidas')->orderBy('id')->get();
        return response()->json($data);
    }

    public function ListarTipoItemProducto()
    {
        //$data = DB::table('tipo_items')->orderBy('id')->get();
        $data = TipoItem::with('medidas')->orderBy('id')->get();
        return response()->json($data);
    }

    public function GuardarListaMarcaProducto(Request $request)
    {
        Marca::create(['nombre' => $request->nombre]);
        return response()->json([
            'code' => 200
        ]);
    }

    public function GuardarListaContenidoProducto(Request $request)
    {
        Contenido::create(['nombre' => $request->nombre]);
        return response()->json([
            'code' => 200
        ]);
    }

    public function GuardarListaColorProducto(Request $request)
    {
        Color::create(['nombre' => $request->nombre]);
        return response()->json([
            'code' => 200
        ]);
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

    public function ListarDatosMarca(Request $request)
    {
        $data = DB::table('marcas')
            ->select('nombre', 'descripcion')
            ->where('id', $request->id)
            ->first();
        return response()->json($data);
    }

    public function ListarDatosContenido(Request $request)
    {
        $data = DB::table('contenidos')
            ->select('nombre', 'descripcion')
            ->where('id', $request->id)
            ->first();
        return response()->json($data);
    }

    public function ListarDatosColor(Request $request)
    {
        $data = DB::table('colors')
            ->select('nombre', 'descripcion')
            ->where('id', $request->id)
            ->first();
        return response()->json($data);
    }

    public function ListarDatosMedida(Request $request)
    {
        $data = DB::table('medidas')
            ->select('nombre', 'descripcion')
            ->where('id', $request->id)
            ->first();
        return response()->json($data);
    }
    public function ListarDatosTipoItem(Request $request)
    {
        $data = TipoItem::where('id', $request->id)
            //->select('nombre', 'descripcion', 'medidas')
            ->with('medidas')
            ->first();

           // $data = TipoItem::with('medidas')->orderBy('id')->get();
            
            
        return response()->json($data);
    }

    public function EditarListaMarca(Request $request)
    {
        Marca::where('id', $request->id)
            ->update([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion
            ]);
        return response()->json([
            'status' => 200
        ]);
    }
    public function EditarListaContenido(Request $request)
    {
        Contenido::where('id', $request->id)
            ->update([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion
            ]);
        return response()->json([
            'status' => 200
        ]);
    }
    public function EditarListaColor(Request $request)
    {
        Color::where('id', $request->id)
            ->update([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion
            ]);
        return response()->json([
            'status' => 200
        ]);
    }
    public function EditarListaMedida(Request $request)
    {
        Medida::where('id', $request->id)
            ->update([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion
            ]);
        return response()->json([
            'status' => 200
        ]);
    }
    public function EditarListaTipoItem(Request $request)
    {
        // $tipoIt = TipoItem::where('id', $request->id)->first();
        // $tipoIt->update([
        //         'nombre' => $request->nombre,
        //         'descripcion' => $request->descripcion

        //     ]);
        // $tipoIt->first()->medidas()->sync($request->medidas);
        $tipoIt = TipoItem::where('id', $request->id)
        ->update([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion

            ]);
        TipoItem::where('id', $request->id)->first()->medidas()->sync($request->medidas);
        return response()->json([
            'status' => 200
        ]);
    }

    public function CambioEstadoMarca(Request $request)
    {
        $estado = 1 - $request->estado;
        Marca::where('id', $request->id)
            ->update([
                'estado' => $estado
            ]);
        return response()->json([
            'status' => 200
        ]);
    }

    public function CambioEstadoContenido(Request $request)
    {
        $estado = 1 - $request->estado;
        Contenido::where('id', $request->id)
            ->update([
                'estado' => $estado
            ]);
        return response()->json([
            'status' => 200
        ]);
    }

    public function CambioEstadoColor(Request $request)
    {
        $estado = 1 - $request->estado;
        Color::where('id', $request->id)
            ->update([
                'estado' => $estado
            ]);
        return response()->json([
            'status' => 200
        ]);
    }

    public function CambioEstadoMedida(Request $request)
    {
        $estado = 1 - $request->estado;
        Medida::where('id', $request->id)
            ->update([
                'estado' => $estado
            ]);
        return response()->json([
            'status' => 200
        ]);
    }
    public function CambioEstadoTipoItem(Request $request)
    {
        $estado = 1 - $request->estado;
        TipoItem::where('id', $request->id)
            ->update([
                'estado' => $estado
            ]);
        return response()->json([
            'status' => 200
        ]);
    }
}