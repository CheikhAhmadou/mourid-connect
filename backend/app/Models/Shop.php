<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shop extends Model
{
    use HasFactory;

    public function getRouteKeyName(): string { return 'slug'; }

    protected $fillable = [
        'user_id', 'name', 'slug', 'description',
        'logo', 'cover_image',
        'country', 'city', 'address',
        'phone', 'whatsapp', 'email', 'website',
        'level', 'is_verified', 'is_active',
    ];

    protected $casts = [
        'is_verified' => 'boolean',
        'is_active'   => 'boolean',
    ];

    const LEVEL_LIMITS = [
        'basic'   => 10,
        'pro'     => null,
        'premium' => null,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function activeProducts(): HasMany
    {
        return $this->hasMany(Product::class)->where('is_active', true);
    }

    public function canAddProduct(): bool
    {
        $limit = self::LEVEL_LIMITS[$this->level] ?? 10;

        if ($limit === null) {
            return true;
        }

        return $this->products()->count() < $limit;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeVerified($query)
    {
        return $query->where('is_verified', true);
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
