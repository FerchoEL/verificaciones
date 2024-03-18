<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHaulierRequest;
use App\Http\Requests\UpdateHaulierRequest;
use App\Http\Resources\GlobalCollection;
use App\Http\Resources\HaulierResource;
use App\Models\Haulier;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class HaulierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = ["status"=>0,"msg"=>"","data"=>""];
        $hauliers = Haulier::with('entity')->get();
        $data = new GlobalCollection($hauliers);
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
    public function store(StoreHaulierRequest $request)
    {
        $response = ["status"=>0,"msg"=>""];
        $data = $request->all();
        new HaulierResource(Haulier::create($data));
        $response["status"]=200;
        $response["msg"]="Operacion completada con éxito";
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response = ["status"=>0,"msg"=>"","data"=>""];
        try {
            $haulier = Haulier::with('entity')->findOrFail($id);
            $data = new HaulierResource($haulier);
            $response["status"]=200;
            $response["msg"]="Operacion completada con éxito";
            $response["data"]=$data;
            return response()->json($response);
        }catch (ModelNotFoundException $e){
            $response["status"]=404;
            $response["msg"]="Transportista no encontrado";
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
    public function update(UpdateHaulierRequest $request, $id)
    {
        $response = ["status"=>0,"msg"=>""];
        try {
            $haulier = Haulier::findOrFail($id);
            $haulier->update($request->all());
            $response["status"]=200;
            $response["msg"]="Operacion completada con éxito";
            return response()->json($response);
        }catch (ModelNotFoundException $e){
            $response["status"]=404;
            $response["msg"]="Transportista no encontrado";
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
            $haulier = Haulier::findOrFail($id);
            $haulier->delete();
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
