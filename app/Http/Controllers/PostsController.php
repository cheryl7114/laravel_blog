<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);

        // Ensure only admins can create, store, edit, update, and destroy posts
        $this->middleware('admin', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $type = $request->input('type', 'blog'); // Default to blog posts
        return view($type == 'blog' ? 'blog.index' : 'community.index')
            ->with('posts', Post::where('type', $type)->orderBy('updated_at', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Automatically determine the post type
        $postType = auth()->user()->is_admin ? 'blog' : 'community';

        // Pass the postType to the view
        return view('posts.create', compact('postType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        // Set the post type based on whether the user is an admin
        $postType = $request->input('type', auth()->user()->is_admin ? 'blog' : 'community');

        Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id,
            'type' => $postType
        ]);

        return redirect($postType == 'blog' ? '/blog' : '/community')
            ->with('message', 'Your post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('posts.show')
            ->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        // Pass the post to the view for editing
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $post = Post::where('slug', $slug)->firstOrFail();

        // Update post details
        $post->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'user_id' => auth()->user()->id,
            'type' => $post->type  // Preserve the type (blog or community)
        ]);

        return redirect($post->type == 'blog' ? '/blog' : '/community')
            ->with('message', 'Your post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        // Only admins can delete blog posts
        if ($post->type == 'blog' && !auth()->user()->is_admin) {
            return redirect()->back()->with('error', 'You cannot delete a blog post.');
        }

        // Users can only delete their own posts
        if ($post->type == 'community' && $post->user_id != auth()->user()->id) {
            return redirect()->back()->with('error', 'You can only delete your own posts.');
        }

        // Delete the post
        $post->delete();
        return redirect($post->type == 'blog' ? '/blog' : '/community')
            ->with('message', 'Your post has been deleted!');
    }
}
