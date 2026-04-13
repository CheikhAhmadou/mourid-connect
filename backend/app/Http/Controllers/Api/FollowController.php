<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserProfileResource;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    // POST /api/follow/{userId}
    public function follow(int $userId)
    {
        $user       = auth()->user();
        $targetUser = User::findOrFail($userId);

        if ($user->id === $userId) {
            return response()->json(['message' => 'Vous ne pouvez pas vous suivre vous-même'], 422);
        }

        if ($user->isFollowing($targetUser)) {
            return response()->json(['message' => 'Vous suivez déjà ce membre'], 422);
        }

        $user->following()->attach($userId);

        Notification::create([
            'id'               => \Str::uuid(),
            'user_id'          => $userId,
            'type'             => 'new_follower',
            'title'            => $user->name . ' vous suit maintenant',
            'body'             => 'Vous avez un nouveau follower !',
            'data'             => ['follower_id' => $user->id],
            'notifiable_id'    => $user->id,
            'notifiable_type'  => User::class,
        ]);

        return response()->json([
            'message'         => 'Vous suivez maintenant ' . $targetUser->name,
            'followers_count' => $targetUser->followers()->count(),
        ]);
    }

    // DELETE /api/follow/{userId}
    public function unfollow(int $userId)
    {
        $user = auth()->user();

        if (!$user->isFollowing(User::findOrFail($userId))) {
            return response()->json(['message' => 'Vous ne suivez pas ce membre'], 422);
        }

        $user->following()->detach($userId);

        return response()->json(['message' => 'Vous ne suivez plus ce membre']);
    }

    // GET /api/followers
    public function followers()
    {
        $followers = auth()->user()->followers()->with('profile')->paginate(20);

        return UserProfileResource::collection(
            $followers->filter(fn($u) => $u->profile)->map->profile
        );
    }

    // GET /api/following
    public function following()
    {
        $following = auth()->user()->following()->with('profile')->paginate(20);

        return UserProfileResource::collection(
            $following->filter(fn($u) => $u->profile)->map->profile
        );
    }
}
