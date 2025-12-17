<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProjectImageResource;

class ProjectDetailsResource extends JsonResource
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
            'link'        => $this->link,
            'image'       => $this->image,
            // 'summary'     => $this->summary,
            'description' => $this->description,
            'category'    => [
                'id'   => $this->category->id ?? null,
                'name' => $this->category->name ?? null,
            ],
            'project_images' => ProjectImageResource::collection($this->images),
            'created_at'  => $this->created_at->format('d-m-Y H:i:s'),
            'updated_at'  => $this->updated_at->format('d-m-Y H:i:s'),
        ];
    }
} 