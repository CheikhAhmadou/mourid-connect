<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductImageResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'url'           => str_starts_with($this->url, 'http') ? $this->url : asset('storage/'.$this->url),
            'url_thumbnail' => $this->url_thumbnail
                ? (str_starts_with($this->url_thumbnail, 'http') ? $this->url_thumbnail : asset('storage/'.$this->url_thumbnail))
                : null,
            'is_main'       => $this->is_main,
            'order'         => $this->order,
            'alt_text'      => $this->alt_text,
        ];
    }
}
