<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                => $this->id,
            'name'              => $this->user->name,
            'email'             => $this->user->email,
            'avatar'            => $this->user->avatar
                                    ? asset('storage/' . $this->user->avatar)
                                    : asset('images/default-avatar.png'),
            'cover_image'       => $this->cover_image_url,
            'bio'               => $this->bio,
            'cheikh_ref'        => $this->cheikh_ref,
            'profession'        => $this->profession,
            'dahira_name'       => $this->dahira_name,
            'country'           => $this->country,
            'city'              => $this->city,
            'latitude'          => $this->latitude,
            'longitude'         => $this->longitude,
            'whatsapp'          => $this->whatsapp,
            'website'           => $this->website,
            'is_visible_map'    => $this->is_visible_map,
            'is_available_help' => $this->is_available_help,
            'followers_count'   => $this->user->followers()->count(),
            'following_count'   => $this->user->following()->count(),
            'posts_count'       => $this->user->posts()->count(),
            'is_following'      => auth()->check()
                                    ? auth()->user()->isFollowing($this->user)
                                    : false,
            'created_at'        => $this->created_at?->format('d/m/Y'),
        ];
    }
}
