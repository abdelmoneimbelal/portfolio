<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'name'        => $this->name,
            'icon'        => $this->icon,
            'description' => $this->description,
            'created_at'  => $this->created_at->format('d-m-Y H:i:s'),
            'updated_at'  => $this->updated_at->format('d-m-Y H:i:s'),
        ];
    }
} 