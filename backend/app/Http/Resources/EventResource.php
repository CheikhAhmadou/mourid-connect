<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                 => $this->id,
            'title'              => $this->title,
            'description'        => $this->description,
            'cover'              => $this->cover_url,
            'type'               => $this->type,
            'location'           => $this->location,
            'latitude'           => $this->latitude,
            'longitude'          => $this->longitude,
            'city'               => $this->city,
            'country'            => $this->country,
            'start_date'         => $this->start_date?->format('d/m/Y H:i'),
            'end_date'           => $this->end_date?->format('d/m/Y H:i'),
            'start_date_human'   => $this->start_date?->diffForHumans(),
            'participants_count' => $this->participants_count,
            'max_participants'   => $this->max_participants,
            'is_full'            => $this->isFull(),
            'is_online'          => $this->is_online,
            'is_participant'     => auth()->check()
                                     ? $this->isParticipant(auth()->user())
                                     : false,
            'organizer'          => [
                'id'   => $this->organizer->id,
                'name' => $this->organizer->name,
            ],
            'group'              => $this->whenLoaded('group', fn() => [
                'id'   => $this->group->id,
                'name' => $this->group->name,
            ]),
            'created_at'         => $this->created_at?->format('d/m/Y'),
        ];
    }
}
