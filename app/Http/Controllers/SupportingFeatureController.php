<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupportingFeatureRequest;
use App\Http\Requests\UpdateSupportingFeatureRequest;
use App\Http\Resources\GlobalCollection;
use App\Http\Resources\SupportingFeatureResource;
use App\Models\SupportingFeature;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class SupportingFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = ["status"=>0,"msg"=>"","data"=>""];
        $supportingfeatures = SupportingFeature::with('vehicle')->get();
        $data = new GlobalCollection($supportingfeatures);
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
    public function store(StoreSupportingFeatureRequest $request)
    {
        $response = ["status"=>0,"msg"=>""];
        $data = $request->all();
        new SupportingFeatureResource(SupportingFeature::create($data));
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
            $supportingfeature = SupportingFeature::with('vehicle')->findOrFail($id);
            $data = new SupportingFeatureResource($supportingfeature);
            $response["status"]=200;
            $response["msg"]="Operacion completada con éxito";
            $response["data"]=$data;
            return response()->json($response);
        }catch (ModelNotFoundException $e){
            $response["status"]=404;
            $response["msg"]="Caracteristicas no encontradas";
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
    public function update(UpdateSupportingFeatureRequest $request, $id)
    {
        $response = ["status"=>0,"msg"=>""];
        try {
            $supportingfeature = SupportingFeature::findOrFail($id);
            $supportingfeature->update($request->all());
            $response["status"]=200;
            $response["msg"]="Operacion completada con éxito";
            return response()->json($response);
        }catch (ModelNotFoundException $e){
            $response["status"]=404;
            $response["msg"]="Caracteristicas no encontradas";
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
            $supportingfeature = SupportingFeature::findOrFail($id);
            $supportingfeature->delete();
            $response["status"]=200;
            $response["msg"]="Operacion completada con éxito";
            return response()->json($response);
        }catch (ModelNotFoundException $e){
            $response["status"]=404;
            $response["msg"]="Ubicación no encontrada";
            return response()->json($response);
        }
    }
}
