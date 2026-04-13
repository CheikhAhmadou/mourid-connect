<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Notification;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // POST /api/posts/{postId}/comment
    public function store(Request $request, int $postId)
    {
        $request->validate([
            'content'   => 'required|string|min:1|max:1000',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        $post    = Post::findOrFail($postId);
        $comment = Comment::create([
            'post_id'   => $postId,
            'user_id'   => auth()->id(),
            'content'   => $request->content,
            'parent_id' => $request->parent_id,
            'is_active' => true,
        ]);

        $post->increment('comments_count');

        if ($post->user_id !== auth()->id()) {
            Notification::create([
                'id'               => \Str::uuid(),
                'user_id'          => $post->user_id,
                'type'             => 'post_comment',
                'title'            => auth()->user()->name . ' a commenté votre post',
                'body'             => substr($request->content, 0, 100),
                'data'             => ['post_id' => $postId, 'comment_id' => $comment->id],
                'notifiable_id'    => $postId,
                'notifiable_type'  => Post::class,
            ]);
        }

        return new CommentResource($comment->load(['user', 'replies.user']));
    }

    // DELETE /api/comments/{id}
    public function destroy(int $id)
    {
        $comment = Comment::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $comment->post->decrement('comments_count');
        $comment->delete();

        return response()->json(['message' => 'Commentaire supprimé']);
    }
}
