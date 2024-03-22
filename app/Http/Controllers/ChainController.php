<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreChainRequest;
use App\Http\Requests\UpdateChainRequest;
use App\Http\Resources\ChainResource;
use App\Http\Resources\GlobalCollection;
use App\Models\Chain;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ChainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = ["status"=>0,"msg"=>"","data"=>""];
        $chains = Chain::with('locations')->get();
        $data = new GlobalCollection($chains);
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

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChainRequest $request)
    {
        $response = ["status"=>0,"msg"=>""];
        $data = $request->all();
        new ChainResource(Chain::create($data));
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
            $chain = Chain::with('locations')->findOrFail($id);
            $data = new ChainResource($chain);
            $response["status"]=200;
            $response["msg"]="Operacion completada con éxito";
            $response["data"]=$data;
            return response()->json($response);
        }catch (ModelNotFoundException $e){
            $response["status"]=404;
            $response["msg"]="Cadena no encontrada";
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
    public function update(UpdateChainRequest $request, $id)
    {
        $response = ["status"=>0,"msg"=>""];
        try {
            $chain = Chain::findOrFail($id);
            $chain->update($request->all());
            $response["status"]=200;
            $response["msg"]="Operacion completada con éxito";
            return response()->json($response);
        }catch (ModelNotFoundException $e){
            $response["status"]=404;
            $response["msg"]="Cadena no encontrada";
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
            $chain = Chain::findOrFail($id);
            $chain->delete();
            $response["status"]=200;
            $response["msg"]="Operacion completada con éxito";
            return response()->json($response);
        }catch (ModelNotFoundException $e){
            $response["status"]=404;
            $response["msg"]="Cadena no encontrada";
            return response()->json($response);
        }
    }
}
