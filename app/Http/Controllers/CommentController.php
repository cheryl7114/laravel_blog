<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    /**
     * Store a newly created comment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Post $post)
    {
        // Validate the request
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        // Create a new comment
        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $post->id;
        $comment->content = $request->input('content');
        $comment->save();

        return redirect()->route('blog.show', $post->slug)
            ->with('message', 'Comment added successfully!');
    }

    /**
     * Remove the specified comment from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Comment $comment)
    {
        // Ensure the authenticated user owns the comment before deleting
        if ($comment->user_id !== auth()->user()->id) {
            return redirect()->back()->with('error', 'You do not have permission to delete this comment.');
        }

        $comment->delete();

        return redirect()->back()->with('message', 'Comment deleted successfully!');
    }
}
