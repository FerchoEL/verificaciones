<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FieldResource extends JsonResource
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
            'category' => $this->category,
            'subcategory' => $this->subcategory,
            'field' => $this->field,
            'type' => $this->type,
            'NOM' => $this->NOM,
            'information' => $this->information,
            'critically' => $this->critically,
            'system_type' => $this->system_type,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];    }
}
