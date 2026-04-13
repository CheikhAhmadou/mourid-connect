<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'user_id',
        'bio',
        'cheikh_ref',
        'profession',
        'dahira_name',
        'cover_image',
        'whatsapp',
        'website',
        'country',
        'city',
        'latitude',
        'longitude',
        'is_visible_map',
        'is_available_help',
    ];

    protected $casts = [
        'is_visible_map'    => 'boolean',
        'is_available_help' => 'boolean',
        'latitude'          => 'decimal:8',
        'longitude'         => 'decimal:8',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeVisibleOnMap($query)
    {
        return $query->where('is_visible_map', true);
    }

    public function scopeAvailableForHelp($query)
    {
        return $query->where('is_available_help', true);
    }

    public function scopeByCountry($query, string $country)
    {
        return $query->where('country', $country);
    }

    public function scopeByCity($query, string $city)
    {
        return $query->where('city', $city);
    }

    public function getCoverImageUrlAttribute(): string
    {
        return $this->cover_image
            ? asset('storage/' . $this->cover_image)
            : asset('images/default-cover.png');
    }
}
