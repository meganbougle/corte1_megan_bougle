<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tienda;

class TiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tiendas = Tienda::select('codigo as Codigo', 'nombre as Nombre', 'descripcion as Descripcion', 'categoria as Categoria', 'precio as Precio', 'stock as Stock')->orderby('nombre')->get();
        return response()->json(['status' => 'success', 'data' => $tiendas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try{
            $tienda = Tienda::create($request->all());
            return response()->json(['status' => 'success',
             'message' =>'Producto creado exitosamente', 'data'=> $tienda]);
        }
        catch(\Exception $e){
            return response()->json(['status' => 'error', 'message' => 'Error al crear el producto', 'data' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        try{
            $tienda=Tienda::where(codigo,$id)
           -> orWhere(nombre,$id)
            ->firstOrFail();
            return response()->json(['status' => 'success', 'data' => $tienda]);
        }
        catch(\Exception $e){
            return response()->json(['status' => 'error', 'message' => 'Error al obtener el producto', 'data' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try{
        $tienda = Tienda::findOrFail($id);
        $tienda->update($request->all());
        return response()->json(['status' => 'success', 'message' => 'Producto actualizado exitosamente', 'data' => $tienda]);}

        catch(\Exception $e){
            return response()->json(['status' => 'error', 'message' => 'Error al actualizar el producto', 'data' => $e->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try{
            $tienda = Tienda::findOrFail($id);
            $tienda->delete();
            return response()->json(['status' => 'success', 'message' => 'Producto eliminado exitosamente', 'data' => $tienda]);
        }
        catch(\Exception $e){
            return response()->json(['status' => 'error', 'message' => 'Error al eliminar el producto', 'data' => $e->getMessage()]);
        }
    }
}
