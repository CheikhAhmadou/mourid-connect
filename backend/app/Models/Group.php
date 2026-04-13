<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Group extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'cover',
        'type',
        'country',
        'city',
        'creator_id',
        'members_count',
        'posts_count',
        'is_active',
        'is_private',
    ];

    protected $casts = [
        'is_active'  => 'boolean',
        'is_private' => 'boolean',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'group_members')
                    ->withPivot('role')
                    ->withTimestamps();
    }

    public function admins()
    {
        return $this->members()->wherePivot('role', 'admin');
    }

    public function posts()
    {
        return $this->hasMany(Post::class)->active();
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByType($query, string $type)
    {
        return $query->where('type', $type);
    }

    public function scopeByCountry($query, string $country)
    {
        return $query->where('country', $country);
    }

    public function isMember(User $user): bool
    {
        return $this->members()->where('user_id', $user->id)->exists();
    }

    public function isAdmin(User $user): bool
    {
        return $this->members()->where('user_id', $user->id)->wherePivot('role', 'admin')->exists();
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($group) {
            if (empty($group->slug)) {
                $group->slug = Str::slug($group->name) . '-' . uniqid();
            }
        });
    }
}
