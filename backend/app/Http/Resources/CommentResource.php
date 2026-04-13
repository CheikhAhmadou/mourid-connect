<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'content'       => $this->content,
            'likes_count'   => $this->likes_count,
            'user'          => [
                'id'     => $this->user->id,
                'name'   => $this->user->name,
                'avatar' => $this->user->avatar
                             ? asset('storage/' . $this->user->avatar)
                             : asset('images/default-avatar.png'),
            ],
            'replies'       => CommentResource::collection($this->whenLoaded('replies')),
            'replies_count' => $this->replies()->count(),
            'parent_id'     => $this->parent_id,
            'created_at'    => $this->created_at?->diffForHumans(),
        ];
    }
}
