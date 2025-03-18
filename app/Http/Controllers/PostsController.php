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
        $this->middleware('admin', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    }

    /**
     * Display a listing of blog or community posts.
     */
    public function index(Request $request)
    {
        $type = $request->input('type', 'blog'); // Default to 'blog'
        $posts = Post::where('type', $type)->orderBy('updated_at', 'DESC')->get();

        return view('blog.index', compact('posts', 'type'));
    }

    /**
     * Show the form for creating a post.
     */
    public function create()
    {
        $postType = auth()->user()->is_admin ? 'blog' : 'community';
        return view('blog.create', compact('postType'));
    }

    /**
     * Store a newly created post.
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

        $postType = $request->input('type', auth()->user()->is_admin ? 'blog' : 'community');

        Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id,
            'type' => $postType
        ]);

        return redirect('/blog')->with('message', 'Your post has been added!');
    }

    /**
     * Display a single post.
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('blog.show', compact('post'));
    }

    /**
     * Show the form for editing a post.
     */
    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('blog.edit', compact('post'));
    }

    /**
     * Update a post.
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $post = Post::where('slug', $slug)->firstOrFail();

        $post->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
        ]);

        return redirect('/blog')->with('message', 'Your post has been updated!');
    }

    /**
     * Delete a post.
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        if ($post->type == 'blog' && !auth()->user()->is_admin) {
            return redirect()->back()->with('error', 'You cannot delete a blog post.');
        }

        if ($post->type == 'community' && $post->user_id != auth()->user()->id) {
            return redirect()->back()->with('error', 'You can only delete your own posts.');
        }

        $post->delete();
        return redirect('/blog')->with('message', 'Your post has been deleted!');
    }
}
