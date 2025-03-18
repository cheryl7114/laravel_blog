<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;
//use App\Models\User;

class LikeController extends Controller
{
    /**
     * Store a newly created like in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        // Check if the user has already liked this post
        $existingLike = Like::where('post_id', $post->id)
            ->where('user_id', auth()->user()->id)
            ->first();

        if ($existingLike) {
            return redirect()->route('blog.show', $post->slug)
                ->with('message', 'You have already liked this post!');
        }

        // Create a new like
        $like = new Like();
        $like->user_id = auth()->user()->id;
        $like->post_id = $post->id;
        $like->save();

        return redirect()->route('blog.show', $post->slug)
            ->with('message', 'You liked this post!');
    }

    /**
     * Remove the like from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Find and delete the user's like on this post
        $like = Like::where('post_id', $post->id)
            ->where('user_id', auth()->user()->id)
            ->first();

        if (!$like) {
            return redirect()->route('blog.show', $post->slug)
                ->with('message', 'You have not liked this post yet!');
        }

        $like->delete();

        return redirect()->route('blog.show', $post->slug)
            ->with('message', 'You unliked this post!');
    }
}
