<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Http\Resources\GlobalCollection;
use App\Http\Resources\VehicleResource;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = ["status"=>0,"msg"=>"","data"=>""];
        $vehicles = Vehicle::with('types')->get();
        $data = new GlobalCollection($vehicles);
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
    public function store(StoreVehicleRequest $request)
    {
        $response = ["status"=>0,"msg"=>""];
        $data = $request->all();
        new VehicleResource(Vehicle::create($data));
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
            $vehicle = Vehicle::with('types')->findOrFail($id);
            $data = new VehicleResource($vehicle);
            $response["status"]=200;
            $response["msg"]="Operacion completada con éxito";
            $response["data"]=$data;
            return response()->json($response);
        }catch (ModelNotFoundException $e){
            $response["status"]=404;
            $response["msg"]="Vehiculo no encontrado";
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
    public function update(UpdateVehicleRequest $request, $id)
    {
        $response = ["status"=>0,"msg"=>""];
        try {
            $vehicle = Vehicle::findOrFail($id);
            $vehicle->update($request->all());
            $response["status"]=200;
            $response["msg"]="Operacion completada con éxito";
            return response()->json($response);
        }catch (ModelNotFoundException $e){
            $response["status"]=404;
            $response["msg"]="Vehiculo no encontrado";
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
            $vehicle = Vehicle::findOrFail($id);
            $vehicle->delete();
            $response["status"]=200;
            $response["msg"]="Operacion completada con éxito";
            return response()->json($response);
        }catch (ModelNotFoundException $e){
            $response["status"]=404;
            $response["msg"]="Vehiculo no encontrado";
            return response()->json($response);
        }
    }
}
