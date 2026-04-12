<?php

namespace App\Http\Resources;

use App\Services\CurrencyService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'             => $this->id,
            'name'           => $this->name,
            'slug'           => $this->slug,
            'description'    => $this->description,
            'price_fcfa'     => $this->price,
            'price_eur'      => CurrencyService::fcfaToEur($this->price),
            'price_promo_fcfa' => $this->price_promo,
            'price_promo_eur'  => $this->price_promo ? CurrencyService::fcfaToEur($this->price_promo) : null,
            'unit'           => $this->unit,
            'stock'          => $this->stock,
            'min_order'      => $this->min_order,
            'delivery_zones' => $this->delivery_zones_array,
            'delivery_delay' => $this->delivery_delay,
            'delivery_free'  => $this->delivery_free,
            'is_available'   => $this->is_available,
            'is_featured'    => $this->is_featured,
            'average_rating' => $this->average_rating,
            'views_count'    => $this->views_count,
            'contacts_count' => $this->contacts_count,
            'shop'           => new ShopResource($this->whenLoaded('shop')),
            'category'       => new CategoryResource($this->whenLoaded('category')),
            'images'         => ProductImageResource::collection($this->whenLoaded('images')),
            'main_image'     => new ProductImageResource($this->whenLoaded('mainImage')),
            'reviews'        => ReviewResource::collection($this->whenLoaded('reviews')),
        ];
    }
}
