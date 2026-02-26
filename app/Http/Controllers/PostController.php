<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Post_tag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        $post = Post::create($data);

        if ($request->has('tags')) {
            foreach ($request->tags as $tag_id) {
                Post_tag::create([
                    'post_id' => $post->id,
                    'tag_id'  => $tag_id
                ]);
            }
        }

        return redirect()->route('posts.index')->with('success', 'Post creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->load('tags', 'comments');
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Post $post)
    {
        Gate::authorize('admin');
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        Gate::authorize('admin');
        $post->update($request->validated());

        if ($request->has('tags')) {
            Post_tag::where('post_id', $post->id)->delete();

            foreach ($request->tags as $tag_id) {
                Post_tag::create([
                    'post_id' => $post->id,
                    'tag_id'  => $tag_id
                ]);
            }
        }

        return redirect()->route('posts.index')->with('success', 'Post actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Post $post)
    {
        Gate::authorize('admin');
        $post->delete();
        return redirect()->route('posts.index');
    }
}
