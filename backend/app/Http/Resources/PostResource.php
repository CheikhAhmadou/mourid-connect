<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'             => $this->id,
            'content'        => $this->content,
            'type'           => $this->type,
            'location'       => $this->location,
            'likes_count'    => $this->likes_count,
            'comments_count' => $this->comments_count,
            'is_liked'       => auth()->check()
                                 ? $this->isLikedBy(auth()->user())
                                 : false,
            'is_pinned'      => $this->is_pinned,
            'user'           => [
                'id'     => $this->user->id,
                'name'   => $this->user->name,
                'avatar' => $this->user->avatar
                             ? asset('storage/' . $this->user->avatar)
                             : asset('images/default-avatar.png'),
                'city'   => $this->user->profile?->city,
            ],
            'group'          => $this->whenLoaded('group', fn() => [
                'id'   => $this->group->id,
                'name' => $this->group->name,
                'slug' => $this->group->slug,
            ]),
            'media'          => PostMediaResource::collection($this->whenLoaded('media')),
            'comments'       => CommentResource::collection($this->whenLoaded('comments')),
            'created_at'     => $this->created_at?->diffForHumans(),
            'created_at_raw' => $this->created_at?->format('d/m/Y H:i'),
        ];
    }
}
