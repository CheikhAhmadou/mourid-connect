<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Event\StoreEventRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // GET /api/events
    public function index(Request $request)
    {
        $events = Event::active()
            ->upcoming()
            ->when($request->type,    fn($q) => $q->byType($request->type))
            ->when($request->city,    fn($q) => $q->where('city', $request->city))
            ->when($request->country, fn($q) => $q->where('country', $request->country))
            ->with(['organizer', 'group'])
            ->orderBy('start_date')
            ->paginate(10);

        return EventResource::collection($events);
    }

    // GET /api/events/{id}
    public function show(int $id)
    {
        $event = Event::with(['organizer', 'group', 'goingParticipants'])->findOrFail($id);

        return new EventResource($event);
    }

    // POST /api/events
    public function store(StoreEventRequest $request)
    {
        $data            = $request->validated();
        $data['user_id'] = auth()->id();
        $data['is_active'] = true;

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('events/covers', 'public');
        }

        $event = Event::create($data);

        return new EventResource($event->load('organizer'));
    }

    // POST /api/events/{id}/join
    public function join(int $id)
    {
        $event = Event::findOrFail($id);
        $user  = auth()->user();

        if ($event->isFull()) {
            return response()->json(['message' => 'Cet événement est complet'], 422);
        }

        if ($event->isParticipant($user)) {
            $event->participants()->detach($user->id);
            $event->decrement('participants_count');

            return response()->json([
                'message'            => "Vous avez quitté l'événement",
                'participants_count' => $event->fresh()->participants_count,
            ]);
        }

        $event->participants()->attach($user->id, ['status' => 'going']);
        $event->increment('participants_count');

        return response()->json([
            'message'            => 'Vous participez à ' . $event->title,
            'participants_count' => $event->fresh()->participants_count,
        ]);
    }
}
