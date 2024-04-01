<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FeatureModResource extends JsonResource
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
            'mod_type' => $this->mod_type,
            'mod_motor' => $this->mod_motor,
            'mod_brake' => $this->mod_brake,
            'mod_suspension' => $this->mod_suspension,
            'mod_axis' => $this->mod_axis,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
