<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SupportingFeatureResource extends JsonResource
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
            'vehicle_id' => $this->vehicle_id,
            'electric_motor' => $this->electric_motor,
            'horsepower' => $this->horsepower,
            'torque' => $this->torque,
            'traction' => $this->traction,
            'capacity' => $this->capacity,
            'brake' => $this->brake,
            'auxiliary' => $this->auxiliary,
            'camera' => $this->camera,
            'regulator' => $this->regulator,
            'tape' => $this->tape,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'vehicle' => new VehicleResource($this->whenLoaded('vehicle')),
        ];
    }
}
