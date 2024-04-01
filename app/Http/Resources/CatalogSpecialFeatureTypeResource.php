<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CatalogSpecialFeatureTypeResource extends JsonResource
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
            'catalog_special_feature_id' => $this->catalog_special_feature_id,
            'type_id' => $this->type_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            //::collection carga la coleccion de datos de una relacion que tiene varios valores
            'special_feature' => new SpecialFeatureResource($this->whenLoaded('units')),
        ];
    }
}
