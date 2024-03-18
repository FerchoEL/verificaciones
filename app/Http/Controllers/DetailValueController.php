<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDetailValueRequest;
use App\Http\Requests\UpdateDetailValueRequest;
use App\Http\Resources\DetailValueResource;
use App\Http\Resources\GlobalCollection;
use App\Models\DetailValue;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class DetailValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = ["status"=>0,"msg"=>"","data"=>""];
        $detailvalues = DetailValue::with('field')->get();
        $data = new GlobalCollection($detailvalues);
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
    public function store(StoreDetailValueRequest $request)
    {
        $response = ["status"=>0,"msg"=>""];
        $data = $request->all();
        new DetailValueResource(DetailValue::create($data));
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
            $detailvalue = DetailValue::with('field')->findOrFail($id);
            $data = new DetailValueResource($detailvalue);
            $response["status"]=200;
            $response["msg"]="Operacion completada con éxito";
            $response["data"]=$data;
            return response()->json($response);
        }catch (ModelNotFoundException $e){
            $response["status"]=404;
            $response["msg"]="Valor detalle no encontrado";
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
    public function update(UpdateDetailValueRequest $request, $id)
    {
        $response = ["status"=>0,"msg"=>""];
        try {
            $detailvalues = DetailValue::findOrFail($id);
            $detailvalues->update($request->all());
            $response["status"]=200;
            $response["msg"]="Operacion completada con éxito";
            return response()->json($response);
        }catch (ModelNotFoundException $e){
            $response["status"]=404;
            $response["msg"]="Valor detalle no encontrado";
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
            $detailvalue = DetailValue::findOrFail($id);
            $detailvalue->delete();
            $response["status"]=200;
            $response["msg"]="Operacion completada con éxito";
            return response()->json($response);
        }catch (ModelNotFoundException $e){
            $response["status"]=404;
            $response["msg"]="Valor detalle no encontrado";
            return response()->json($response);
        }
    }
}
