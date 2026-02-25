<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:tags,name']);
        Tag::create($request->all());
        return back()->with('success', 'Etiqueta creada');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return back()->with('success', 'Etiqueta eliminada');
    }
}
