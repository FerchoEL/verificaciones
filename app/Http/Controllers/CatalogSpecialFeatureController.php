<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCatalogSpecialFeatureRequest;
use App\Http\Requests\UpdateCatalogSpecialFeatureRequest;
use App\Http\Resources\CatalogSpecialFeatureResource;
use App\Http\Resources\GlobalCollection;
use App\Models\CatalogSpecialFeature;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CatalogSpecialFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = ["status"=>0,"msg"=>"","data"=>""];
        $catalogspecialfeatures = CatalogSpecialFeature::all();
        $data = new GlobalCollection($catalogspecialfeatures);
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
    public function store(StoreCatalogSpecialFeatureRequest $request)
    {
        $response = ["status"=>0,"msg"=>""];
        $data = $request->all();
        new CatalogSpecialFeatureResource(CatalogSpecialFeature::create($data));
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
            $catalogspecialfeature = CatalogSpecialFeature::findOrFail($id);
            $data = new CatalogSpecialFeatureResource($catalogspecialfeature);
            $response["status"]=200;
            $response["msg"]="Operacion completada con éxito";
            $response["data"]=$data;
            return response()->json($response);
        }catch (ModelNotFoundException $e){
            $response["status"]=404;
            $response["msg"]="Catalogo de caracteristicas especiales no encontrado";
            $response["data"]=null;
            return response()->json($response);
        }
    }

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
    public function update(UpdateCatalogSpecialFeatureRequest $request, $id)
    {
        $response = ["status"=>0,"msg"=>""];
        try {
            $catalogspecialfeature = CatalogSpecialFeature::findOrFail($id);
            $catalogspecialfeature->update($request->all());
            $response["status"]=200;
            $response["msg"]="Operacion completada con éxito";
            return response()->json($response);
        }catch (ModelNotFoundException $e){
            $response["status"]=404;
            $response["msg"]="Catalogo de caracteristicas especiales no encontrado";
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
            $catalogspecialfeature = CatalogSpecialFeature::findOrFail($id);
            $catalogspecialfeature->delete();
            $response["status"]=200;
            $response["msg"]="Operacion completada con éxito";
            return response()->json($response);
        }catch (ModelNotFoundException $e){
            $response["status"]=404;
            $response["msg"]="Catalogo de caracteristicas especiales no encontrado";
            return response()->json($response);
        }
    }
}
