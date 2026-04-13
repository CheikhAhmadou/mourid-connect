<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'slug'          => $this->slug,
            'description'   => $this->description,
            'cover'         => $this->cover
                                ? asset('storage/' . $this->cover)
                                : asset('images/default-group.png'),
            'type'          => $this->type,
            'country'       => $this->country,
            'city'          => $this->city,
            'members_count' => $this->members_count,
            'posts_count'   => $this->posts_count,
            'is_private'    => $this->is_private,
            'is_member'     => auth()->check()
                                ? $this->isMember(auth()->user())
                                : false,
            'is_admin'      => auth()->check()
                                ? $this->isAdmin(auth()->user())
                                : false,
            'creator'       => [
                'id'   => $this->creator->id,
                'name' => $this->creator->name,
            ],
            'created_at'    => $this->created_at?->format('d/m/Y'),
        ];
    }
}
