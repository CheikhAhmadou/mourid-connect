<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\StoreGroupRequest;
use App\Http\Resources\GroupResource;
use App\Http\Resources\PostResource;
use App\Models\Group;
use App\Models\Notification;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GroupController extends Controller
{
    // GET /api/groups
    public function index(Request $request)
    {
        $groups = Group::active()
            ->when($request->type,    fn($q) => $q->byType($request->type))
            ->when($request->country, fn($q) => $q->byCountry($request->country))
            ->when($request->search,  fn($q) => $q->where('name', 'like', '%' . $request->search . '%'))
            ->latest()
            ->paginate(15);

        return GroupResource::collection($groups);
    }

    // GET /api/groups/{slug}
    public function show(string $slug)
    {
        $group = Group::with(['creator', 'members'])
            ->where('slug', $slug)
            ->firstOrFail();

        return new GroupResource($group);
    }

    // POST /api/groups
    public function store(StoreGroupRequest $request)
    {
        $data               = $request->validated();
        $data['creator_id'] = auth()->id();
        $data['slug']       = Str::slug($request->name) . '-' . uniqid();
        $data['is_active']  = true;

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('groups/covers', 'public');
        }

        $group = Group::create($data);
        $group->members()->attach(auth()->id(), ['role' => 'admin']);
        $group->increment('members_count');

        return new GroupResource($group);
    }

    // POST /api/groups/{id}/join
    public function join(int $id)
    {
        $group = Group::findOrFail($id);
        $user  = auth()->user();

        if ($group->isMember($user)) {
            return response()->json(['message' => 'Vous êtes déjà membre de ce groupe'], 422);
        }

        $group->members()->attach($user->id, ['role' => 'member']);
        $group->increment('members_count');

        Notification::create([
            'id'               => \Str::uuid(),
            'user_id'          => $group->creator_id,
            'type'             => 'group_join',
            'title'            => $user->name . ' a rejoint votre groupe',
            'body'             => 'Nouveau membre dans ' . $group->name,
            'data'             => ['group_id' => $id, 'user_id' => $user->id],
            'notifiable_id'    => $id,
            'notifiable_type'  => Group::class,
        ]);

        return response()->json([
            'message'       => 'Vous avez rejoint le groupe ' . $group->name,
            'members_count' => $group->fresh()->members_count,
        ]);
    }

    // DELETE /api/groups/{id}/leave
    public function leave(int $id)
    {
        $group = Group::findOrFail($id);
        $user  = auth()->user();

        if (!$group->isMember($user)) {
            return response()->json(['message' => "Vous n'êtes pas membre de ce groupe"], 422);
        }

        $group->members()->detach($user->id);
        $group->decrement('members_count');

        return response()->json(['message' => 'Vous avez quitté le groupe']);
    }

    // GET /api/groups/{id}/posts
    public function posts(int $id)
    {
        Group::findOrFail($id);

        $posts = Post::with(['user.profile', 'media'])
            ->active()
            ->where('group_id', $id)
            ->latest()
            ->paginate(10);

        return PostResource::collection($posts);
    }
}
