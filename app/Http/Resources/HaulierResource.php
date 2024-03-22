<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HaulierResource extends JsonResource
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
            'name' => $this->name,
            'idsap' => $this->idsap,
            'rfc' => $this->rfc,
            'phone' => $this->phone,
            'email' => $this->email,
            'entity_id' => $this->entity_id,
            'city' => $this->city,
            'street' => $this->street,
            'address' => $this->address,
            'cp' => $this->cp,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'entity' => new EntityResource($this->whenLoaded('entity')),
        ];
    }
}
