<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'user_id',
        'group_id',
        'title',
        'description',
        'cover',
        'type',
        'location',
        'latitude',
        'longitude',
        'city',
        'country',
        'start_date',
        'end_date',
        'participants_count',
        'max_participants',
        'is_active',
        'is_online',
    ];

    protected $casts = [
        'start_date'  => 'datetime',
        'end_date'    => 'datetime',
        'is_active'   => 'boolean',
        'is_online'   => 'boolean',
        'latitude'    => 'decimal:8',
        'longitude'   => 'decimal:8',
    ];

    public function organizer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function participants()
    {
        return $this->belongsToMany(User::class, 'event_participants')
                    ->withPivot('status')
                    ->withTimestamps();
    }

    public function goingParticipants()
    {
        return $this->participants()->wherePivot('status', 'going');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeUpcoming($query)
    {
        return $query->where('start_date', '>=', now());
    }

    public function scopePast($query)
    {
        return $query->where('start_date', '<', now());
    }

    public function scopeByType($query, string $type)
    {
        return $query->where('type', $type);
    }

    public function isParticipant(User $user): bool
    {
        return $this->participants()->where('user_id', $user->id)->exists();
    }

    public function isFull(): bool
    {
        if (!$this->max_participants) return false;
        return $this->participants_count >= $this->max_participants;
    }

    public function getCoverUrlAttribute(): string
    {
        return $this->cover
            ? asset('storage/' . $this->cover)
            : asset('images/default-event.png');
    }
}
