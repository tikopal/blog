<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required|min:3',
        ]);

        $post->comments()->create([
            'body' => $request->body
        ]);

        return back()->with('success', 'Comentario añadido correctamente');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back()->with('success', 'Comentario eliminado');
    }
}
