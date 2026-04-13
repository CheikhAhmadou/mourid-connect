<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostMediaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'url'           => $this->full_url,
            'url_thumbnail' => $this->thumbnail_url,
            'type'          => $this->type,
            'order'         => $this->order,
        ];
    }
}
