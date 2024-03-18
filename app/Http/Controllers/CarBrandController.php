<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarBrandRequest;
use App\Http\Requests\UpdateCarBrandRequest;
use App\Http\Resources\CarBrandResource;
use App\Http\Resources\GlobalCollection;
use App\Models\CarBrand;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CarBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = ["status"=>0,"msg"=>"","data"=>""];
        $carbrands = CarBrand::with('components')->get();
        $data = new GlobalCollection($carbrands);
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
    public function store(StoreCarBrandRequest $request)
    {
        $response = ["status"=>0,"msg"=>""];
        $data = $request->all();
        new CarBrandResource(CarBrand::create($data));
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
            $carbrand = CarBrand::with('components')->findOrFail($id);
            $data = new CarBrandResource($carbrand);
            $response["status"]=200;
            $response["msg"]="Operacion completada con éxito";
            $response["data"]=$data;
            return response()->json($response);
        }catch (ModelNotFoundException $e){
            $response["status"]=404;
            $response["msg"]="Marca de carro no encontrada";
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
    public function update(UpdateCarBrandRequest $request, $id)
    {
        $response = ["status"=>0,"msg"=>""];
        try {
            $carbrand = CarBrand::findOrFail($id);
            $carbrand->update($request->all());
            $response["status"]=200;
            $response["msg"]="Operacion completada con éxito";
            return response()->json($response);
        }catch (ModelNotFoundException $e){
            $response["status"]=404;
            $response["msg"]="Marca de carro no encontrada";
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
            $carbrand = CarBrand::findOrFail($id);
            $carbrand->delete();
            $response["status"]=200;
            $response["msg"]="Operacion completada con éxito";
            return response()->json($response);
        }catch (ModelNotFoundException $e){
            $response["status"]=404;
            $response["msg"]="Marca de carro no encontrada";
            return response()->json($response);
        }
    }
}
