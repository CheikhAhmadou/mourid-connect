<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Notification;
use App\Models\Post;
use App\Models\PostLike;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // GET /api/posts
    public function index(Request $request)
    {
        $followingIds = auth()->user()->following->pluck('id');

        $posts = Post::with(['user.profile', 'media', 'comments.user'])
            ->active()
            ->where(function ($query) use ($followingIds) {
                $query->whereIn('user_id', $followingIds)
                      ->orWhere('user_id', auth()->id());
            })
            ->when($request->group_id, fn($q) => $q->where('group_id', $request->group_id))
            ->latest()
            ->paginate(10);

        return PostResource::collection($posts);
    }

    // GET /api/posts/{id}
    public function show(int $id)
    {
        $post = Post::with(['user.profile', 'media', 'comments.user', 'comments.replies.user', 'group'])
            ->active()
            ->findOrFail($id);

        return new PostResource($post);
    }

    // POST /api/posts
    public function store(StorePostRequest $request)
    {
        $post = Post::create([
            ...$request->safe()->except('images'),
            'user_id'   => auth()->id(),
            'type'      => $request->type ?? 'text',
            'is_active' => true,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('posts', 'public');
                $post->media()->create(['url' => $path, 'type' => 'image', 'order' => $index]);
            }
            $post->update(['type' => 'photo']);
        }

        auth()->user()->followers->each(function ($follower) use ($post) {
            Notification::create([
                'id'      => (string) \Str::uuid(),
                'user_id' => $follower->id,
                'type'    => 'App\\Notifications\\NewPost',
                'data'    => json_encode([
                    'actor_id'   => auth()->id(),
                    'actor_name' => auth()->user()->name,
                    'text'       => auth()->user()->name . ' a publié un post',
                    'post_id'    => $post->id,
                    'link'       => '/connect',
                    'icon'       => 'article',
                ]),
            ]);
        });

        return new PostResource($post->load(['user', 'media']));
    }

    // PUT /api/posts/{id}
    public function update(UpdatePostRequest $request, int $id)
    {
        $post = Post::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $post->update($request->validated());

        return new PostResource($post->load(['user', 'media']));
    }

    // DELETE /api/posts/{id}
    public function destroy(int $id)
    {
        Post::where('id', $id)->where('user_id', auth()->id())->firstOrFail()->delete();

        return response()->json(['message' => 'Post supprimé avec succès']);
    }

    // POST /api/posts/{id}/like
    public function like(int $id)
    {
        $post = Post::findOrFail($id);
        $user = auth()->user();

        $existing = PostLike::where('post_id', $id)->where('user_id', $user->id)->first();

        if ($existing) {
            $existing->delete();
            $post->decrement('likes_count');
            return response()->json(['liked' => false, 'likes_count' => $post->fresh()->likes_count]);
        }

        PostLike::create(['post_id' => $id, 'user_id' => $user->id]);
        $post->increment('likes_count');

        if ($post->user_id !== $user->id) {
            Notification::create([
                'id'      => (string) \Str::uuid(),
                'user_id' => $post->user_id,
                'type'    => 'App\\Notifications\\PostLiked',
                'data'    => json_encode([
                    'actor_id'   => $user->id,
                    'actor_name' => $user->name,
                    'text'       => $user->name . ' a aimé votre publication.',
                    'post_id'    => $id,
                    'link'       => '/connect',
                    'icon'       => 'favorite',
                ]),
            ]);
        }

        return response()->json(['liked' => true, 'likes_count' => $post->fresh()->likes_count]);
    }
}
