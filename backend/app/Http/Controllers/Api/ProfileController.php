<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Http\Resources\UserProfileResource;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // GET /api/profile/{userId}
    public function show(int $userId)
    {
        $profile = UserProfile::with('user')
            ->where('user_id', $userId)
            ->firstOrFail();

        return new UserProfileResource($profile);
    }

    // PUT /api/profile
    public function update(UpdateProfileRequest $request)
    {
        $user    = auth()->user();
        $profile = $user->profile ?? $user->profile()->create([]);

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('profiles/covers', 'public');
            $profile->update(['cover_image' => $path]);
        }

        $profile->update($request->safe()->except('cover_image'));

        return new UserProfileResource($profile->fresh(['user']));
    }

    // GET /api/members/map
    public function map(Request $request)
    {
        $members = UserProfile::visibleOnMap()
            ->when($request->country, fn($q) => $q->byCountry($request->country))
            ->when($request->city,    fn($q) => $q->byCity($request->city))
            ->with('user:id,name,avatar')
            ->select(['user_id', 'latitude', 'longitude', 'city', 'country', 'dahira_name', 'profession', 'is_available_help'])
            ->get();

        return response()->json(['data' => $members]);
    }

    // GET /api/members/nearby
    public function nearby(Request $request)
    {
        $myProfile = auth()->user()->profile;

        if (!$myProfile?->city) {
            return response()->json(['message' => 'Mettez à jour votre ville dans votre profil'], 422);
        }

        $members = UserProfile::visibleOnMap()
            ->byCity($myProfile->city)
            ->where('user_id', '!=', auth()->id())
            ->with('user:id,name,avatar')
            ->get();

        return response()->json(['data' => $members]);
    }

    // GET /api/members/search
    public function search(Request $request)
    {
        $request->validate(['q' => 'required|string|min:2']);

        $members = UserProfile::visibleOnMap()
            ->where(function ($query) use ($request) {
                $query->whereHas('user', fn($q) => $q->where('name', 'like', '%' . $request->q . '%'))
                      ->orWhere('profession',  'like', '%' . $request->q . '%')
                      ->orWhere('dahira_name', 'like', '%' . $request->q . '%');
            })
            ->with('user')
            ->paginate(15);

        return UserProfileResource::collection($members);
    }
}
