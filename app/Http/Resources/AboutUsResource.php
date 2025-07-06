<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutUsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                  => $this->id,
            'title'               => $this->title,
            'description'         => $this->description,
            'mission'             => $this->mission,
            'vision'              => $this->vision,
            'values'              => $this->values,
            'image'               => $this->image,
            'years_experience'    => $this->years_experience,
            'projects_completed'  => $this->projects_completed,
            'happy_clients'       => $this->happy_clients,
            'is_active'           => $this->is_active,
        ];
    }
} 