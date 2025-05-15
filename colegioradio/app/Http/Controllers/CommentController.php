<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('success', 'Comentario eliminado correctamente.');
    }

    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'comment' => 'required|string|max:500',
        ]);

        $comment->content = $request->comment;
        $comment->save();

        return redirect()->back()->with('success', 'Comentario actualizado correctamente.');
    }

    public function store(Request $request)
    {
        // Validar el comentario
        $request->validate([
            'comment' => 'required|string|max:500',
        ]);

        // Guardar el comentario
        $comment = new Comment();
        $comment->content = $request->comment;
        $comment->user_id = auth()->id(); // Si el usuario está autenticado
        $comment->save();

        // Redirigir de vuelta con mensaje de éxito
        return redirect()->back()->with('success', 'Comentario enviado correctamente.');
    }

    public function approve(Comment $comment)
    {
        $comment->status = 'visible';
        $comment->save();
        return redirect()->back()->with('success', 'Comentario aprobado.');
    }

    public function hide(Comment $comment)
    {
        $comment->status = 'hidden';
        $comment->save();
        return redirect()->back()->with('success', 'Comentario ocultado.');
    }
}