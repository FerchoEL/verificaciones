<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
use App\Http\Resources\GlobalCollection;
use App\Http\Resources\UnitResource;
use App\Models\CatalogSpecialFeatureType;
use App\Models\Component;
use App\Models\Type;
use App\Models\Unit;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = ["status"=>0,"msg"=>"","data"=>""];
        $units = Unit::with('feature','featureMod','featureMotorUnit','catalogSpecialFeatureTypes','unitDocument')->get();
        $data = new GlobalCollection($units);
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
    public function store(StoreUnitRequest $request)
    {
        $response = ["status"=>0,"msg"=>""];
        $data = $request->all();
        $component = Component::find($data["component_id"]);
        $unitData = Unit::saveData($data, $component);
        $response["status"]=200;
        $response["msg"]=$unitData;
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $response = ["status"=>0,"msg"=>"","data"=>""];
        try {
            $units = Unit::with('feature','featureMod','featureMotorUnit','catalogSpecialFeatureTypes','unitDocument')->findOrFail($id);
            $data = new UnitResource($units);
            $response["status"]=200;
            $response["msg"]="Operacion completada con éxito";
            $response["data"]=$data;
            return response()->json($response);
        }catch (ModelNotFoundException $e){
            $response["status"]=404;
            $response["msg"]="Unidad no encontrada";
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
    public function update(UpdateUnitRequest $request, $id)
    {
        $response = ["status"=>0,"msg"=>""];
        try {
            $unit = Unit::findOrFail($id);
            $data = $request->all();
            $unitData = Unit::updateData($unit,$data);
            $response["status"]=200;
            $response["msg"]=$unitData;
            return response()->json($response);
        }catch (ModelNotFoundException $e){
            $response["status"]=404;
            $response["msg"]="Unidad no encontrada";
            return response()->json($response);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
