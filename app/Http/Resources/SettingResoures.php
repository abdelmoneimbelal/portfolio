<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResoures extends JsonResource
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
            'email'       => $this->email,
            'phone'       => $this->phone,
            'address'     => $this->address,
            'logo'        => $this->logo,
            'favicon'     => $this->favicon, 
            'description' => $this->description,
            'facebook'    => $this->facebook,
            'instagram'   => $this->instagram,
            'twitter'     => $this->twitter,
            'linkedin'    => $this->linkedin,
            'is_active'   => $this->is_active,
            'created_at'  => $this->created_at->format('d-m-Y H:i:s'),
            'updated_at'  => $this->updated_at->format('d-m-Y H:i:s'),
        ];
    }
}
