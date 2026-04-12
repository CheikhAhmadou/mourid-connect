<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShopResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'             => $this->id,
            'name'           => $this->name,
            'slug'           => $this->slug,
            'description'    => $this->description,
            'logo'           => $this->logo ? asset('storage/'.$this->logo) : null,
            'cover_image'    => $this->cover_image ? asset('storage/'.$this->cover_image) : null,
            'country'        => $this->country,
            'city'           => $this->city,
            'phone'          => $this->phone,
            'whatsapp'       => $this->whatsapp,
            'email'          => $this->email,
            'website'        => $this->website,
            'level'          => $this->level,
            'is_verified'    => $this->is_verified,
            'views_count'    => $this->views_count,
            'contacts_count' => $this->contacts_count,
            'owner'          => new UserResource($this->whenLoaded('user')),
            'products'       => ProductResource::collection($this->whenLoaded('activeProducts')),
        ];
    }
}
