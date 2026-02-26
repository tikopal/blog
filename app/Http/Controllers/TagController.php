<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TagController extends Controller
{
    public function index()
    {
        Gate::authorize('admin');
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    public function store(Request $request)
    {
        Gate::authorize('admin');
        $request->validate(['name' => 'required|unique:tags,name']);
        Tag::create($request->all());
        return back()->with('success', 'Etiqueta creada');
    }

    public function destroy(Tag $tag)
    {
        Gate::authorize('admin');
        $tag->delete();
        return back()->with('success', 'Etiqueta eliminada');
    }
}
