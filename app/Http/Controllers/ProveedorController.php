<?php

namespace App\Http\Controllers;

use App\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('proveedors')->orderBy('id')->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Proveedor::create([
            'nombre_proveedor' => $request->nombre,
            'nombre_empresa'=>$request->empresa,
            'recursos' => $request->recursos,
            'celular' => $request->celular,
            'ubicacion' => $request->ubicacion,
            'correo' => $request->correo
        ]);
        return response()->json([
            'code' => 200
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = DB::table('proveedors')
            ->select('nombre_empresa', 'nombre_proveedor', 'recursos','celular', 'ubicacion', 'correo')
            ->where('id', $request->id)
            ->first();
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Proveedor::where('id', $request->id)
            ->update([
                'nombre_empresa' => $request->nombreEmpresa,
                'nombre_proveedor' => $request->nombreProveedor,
                'recursos' => $request->recursosOtorgados,
                'celular' => $request->celularProveedor,
                'ubicacion' => $request->ubicacionProveedor,
                'correo' => $request->correoProveedor

            ]);
        return response()->json([
            'status' => 200
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
