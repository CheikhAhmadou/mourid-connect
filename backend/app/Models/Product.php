<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    public function getRouteKeyName(): string { return 'slug'; }

    protected $fillable = [
        'shop_id', 'category_id', 'name', 'slug', 'description', 'specifications',
        'price', 'price_promo', 'unit',
        'stock', 'min_order',
        'delivery_zones', 'delivery_delay', 'delivery_free',
        'is_available', 'is_featured', 'is_active',
    ];

    protected $casts = [
        'price'         => 'decimal:2',
        'price_promo'   => 'decimal:2',
        'delivery_free' => 'boolean',
        'is_available'  => 'boolean',
        'is_featured'   => 'boolean',
        'is_active'     => 'boolean',
    ];

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('order');
    }

    public function mainImage(): HasOne
    {
        return $this->hasOne(ProductImage::class)->where('is_main', true);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function getDeliveryZonesArrayAttribute(): array
    {
        if (! $this->delivery_zones) {
            return [];
        }

        return array_map('trim', explode(',', $this->delivery_zones));
    }

    public function getAverageRatingAttribute(): float
    {
        return round($this->reviews()->avg('rating') ?? 0, 1);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->where('is_available', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function incrementViews(): void
    {
        $this->increment('views_count');
    }

    public function incrementContacts(): void
    {
        $this->increment('contacts_count');
    }
}
