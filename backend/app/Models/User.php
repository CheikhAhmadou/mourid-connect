<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasApiTokens, HasFactory, HasRoles, Notifiable;

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function shops(): HasMany
    {
        return $this->hasMany(Shop::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    // ── Connect : Profil étendu
    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    // ── Connect : Posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // ── Connect : Abonnements
    public function following()
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'following_id')
                    ->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'follower_id')
                    ->withTimestamps();
    }

    public function isFollowing(User $user): bool
    {
        return $this->following()->where('following_id', $user->id)->exists();
    }

    // ── Connect : Groupes
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_members')
                    ->withPivot('role')
                    ->withTimestamps();
    }

    public function createdGroups()
    {
        return $this->hasMany(Group::class, 'creator_id');
    }

    // ── Connect : Notifications
    public function notifications()
    {
        return $this->hasMany(Notification::class)->latest();
    }

    public function unreadNotifications()
    {
        return $this->hasMany(Notification::class)->whereNull('read_at');
    }

    public function getUnreadNotificationsCountAttribute(): int
    {
        return $this->unreadNotifications()->count();
    }

    // ── Connect : Événements
    public function organizedEvents()
    {
        return $this->hasMany(Event::class);
    }

    public function participatingEvents()
    {
        return $this->belongsToMany(Event::class, 'event_participants')
                    ->withPivot('status')
                    ->withTimestamps();
    }
}
