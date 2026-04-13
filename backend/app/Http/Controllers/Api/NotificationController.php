<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // GET /api/notifications
    public function index(Request $request)
    {
        $notifications = auth()->user()
            ->notifications()
            ->when($request->unread, fn($q) => $q->unread())
            ->paginate(20);

        return NotificationResource::collection($notifications);
    }

    // PUT /api/notifications/{id}/read
    public function markRead(string $id)
    {
        $notification = Notification::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $notification->markAsRead();

        return response()->json(['message' => 'Notification marquée comme lue']);
    }

    // PUT /api/notifications/read-all
    public function markAllRead()
    {
        auth()->user()->notifications()->unread()->update([
            'is_read' => true,
            'read_at' => now(),
        ]);

        return response()->json(['message' => 'Toutes les notifications sont lues']);
    }

    // GET /api/notifications/count
    public function unreadCount()
    {
        return response()->json([
            'count' => auth()->user()->unreadNotifications()->count(),
        ]);
    }
}
