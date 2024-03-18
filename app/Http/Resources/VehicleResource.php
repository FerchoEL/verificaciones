<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
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
            'transport' => $this->transport,
            'num_component' => $this->num_component,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'types' => TypeResource::collection($this->whenLoaded('types')),
        ];
    }
}
