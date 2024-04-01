<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UnitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'date' => $this->date,
            'user_id' => $this->user_id,
            'idsap' => $this->idsap,
            'vehicle_id' => $this->vehicle_id,
            'component_id' => $this->component_id,
            'chassis_serial' => $this->chassis_serial,
            'chassis_serial_origin' => $this->chassis_serial_origin,
            'license_plate' => $this->license_plate,
            'license_plate_origin' => $this->license_plate_origin,
            'license_plate_type' => $this->license_plate_type,
            'permission' => $this->permission,
            'license_plate_tractor' => $this->license_plate_tractor,
            'location_id' => $this->location_id,
            'entity_id' => $this->entity_id,
            'sticker_serial' => $this->sticker_serial,
            'car_brand' => $this->car_brand,
            'car_model' => $this->car_model,
            'modification' => $this->modification,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            //::collection carga la coleccion de datos de una relacion que tiene varios valores
            'feature' => new FeatureResource($this->whenLoaded('feature')),
            'feature_mod' => new FeatureModResource($this->whenLoaded('featureMod')),
            'feature_motor_unit' => new FeatureMotorUnitResource($this->whenLoaded('featureMotorUnit')),
            'catalog_special_feature_types' => CatalogSpecialFeatureTypeResource::collection($this->whenLoaded('catalogSpecialFeatureTypes')),
        ];
    }
}
