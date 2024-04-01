<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FeatureMotorUnitResource extends JsonResource
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
            'unit_id' => $this->unit_id,
            'electric_motor' => $this->electric_motor,
            'horsepower' => $this->horsepower,
            'torque' => $this->torque,
            'traction' => $this->traction,
            'capacity' => $this->capacity,
            'auxiliary' => $this->auxiliary,
            'regulator' => $this->regulator,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
