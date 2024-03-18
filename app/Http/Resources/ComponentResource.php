<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ComponentResource extends JsonResource
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
            'component' => $this->component,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            //::collection carga la coleccion de datos de una relacion que tiene varios valores
            'configurations' => ConfigurationResource::collection($this->whenLoaded('configurations')),
        ];
    }
}
