<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAxisCatalogRequest;
use App\Http\Requests\UpdateAxisCatalogRequest;
use App\Http\Resources\AxisCatalogResource;
use App\Http\Resources\GlobalCollection;
use App\Models\AxisCatalog;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class AxisCatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = ["status"=>0,"msg"=>"","data"=>""];
        $axiscatalogs = AxisCatalog::all();
        $data = new GlobalCollection($axiscatalogs);
        $response["status"]=200;
        $response["msg"]="Operacion completada con éxito";
        $response["data"]=$data;
        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAxisCatalogRequest $request)
    {
        $response = ["status"=>0,"msg"=>""];
        $data = $request->all();
        new AxisCatalogResource(AxisCatalog::create($data));
        $response["status"]=200;
        $response["msg"]="Operacion completada con éxito";
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $response = ["status"=>0,"msg"=>"","data"=>""];
        try {
            $axiscatalog = AxisCatalog::findOrFail($id);
            $data = new AxisCatalogResource($axiscatalog);
            $response["status"]=200;
            $response["msg"]="Operacion completada con éxito";
            $response["data"]=$data;
            return response()->json($response);
        }catch (ModelNotFoundException $e){
            $response["status"]=404;
            $response["msg"]="Catalogo de Ejes no encontrada";
            $response["data"]=null;
            return response()->json($response);
        }    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAxisCatalogRequest $request, $id)
    {
        $response = ["status"=>0,"msg"=>""];
        try {
            $axiscatalog = AxisCatalog::findOrFail($id);
            $axiscatalog->update($request->all());
            $response["status"]=200;
            $response["msg"]="Operacion completada con éxito";
            return response()->json($response);
        }catch (ModelNotFoundException $e){
            $response["status"]=404;
            $response["msg"]="Catalogo de Ejes no encontrada";
            return response()->json($response);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $response = ["status"=>0,"msg"=>""];
        try {
            $axiscatalog = AxisCatalog::findOrFail($id);
            $axiscatalog->delete();
            $response["status"]=200;
            $response["msg"]="Operacion completada con éxito";
            return response()->json($response);
        }catch (ModelNotFoundException $e){
            $response["status"]=404;
            $response["msg"]="Catalogo de Ejes no encontrada";
            return response()->json($response);
        }
    }
}
