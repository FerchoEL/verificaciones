<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailValueResource extends JsonResource
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
            'description' => $this->description,
            'field_id' => $this->field_id,
            'satisfy' => $this->satisfy,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'field' => new FieldResource($this->whenLoaded('field')),
        ];    }
}
