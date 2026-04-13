<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = is_array($this->data) ? $this->data : (json_decode($this->data ?? '{}', true) ?? []);
        return [
            'id'         => $this->id,
            'type'       => $this->type,
            'text'       => $data['text']       ?? '',
            'icon'       => $data['icon']       ?? 'notifications',
            'link'       => $data['link']       ?? '/connect',
            'actor_name' => $data['actor_name'] ?? null,
            'data'       => $data,
            'is_read'    => $this->read_at !== null,
            'read_at'    => $this->read_at?->format('d/m/Y H:i'),
            'created_at' => $this->created_at?->diffForHumans(),
        ];
    }
}
