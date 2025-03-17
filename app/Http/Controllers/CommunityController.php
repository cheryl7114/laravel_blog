<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class CommunityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the community posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('community.index')
            ->with('posts', Post::where('type', 'community')->orderBy('updated_at', 'DESC')->get());
    }

    /**
     * Show the form for creating a new community post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('community.create');
    }

    /**
     * Display the specified community post.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('community.show')
            ->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified community post.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('community.edit')
            ->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Remove the specified community post from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        // Redirect to the PostController destroy method to handle deletion for consistency
        return app(PostsController::class)->destroy($slug);
    }
}
