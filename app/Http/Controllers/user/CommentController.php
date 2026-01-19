<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'film_id' => 'required|exists:films,id',
        'comment' => 'required|string'
    ]);

    Comment::create([
        'user_id' => auth()->id(),
        'film_id' => $request->film_id,
        'comment' => $request->comment, 
    ]);

    return back()->with('success', 'Komentar berhasil dikirim');
}

public function edit(Comment $comment)
{
    if (auth()->id() !== $comment->user_id) {
        abort(403, 'Unauthorized action.');
    }

    return view('user.comments.edit', compact('comment'));
}


public function update(Request $request, Comment $comment)
{
    if (auth()->id() !== $comment->user_id) {
        abort(403);
    }

    $request->validate([
        'comment' => 'required|string',
    ]);

    $comment->update([
        'comment' => $request->comment,
    ]);

    return redirect()->route('user.films.show', $comment->film_id)
                     ->with('success', 'Komentar berhasil diperbarui!');
}

public function destroy(Comment $comment)
{
    // Keamanan tingkat lanjut: Pastikan user yang hapus adalah pemiliknya
    if (auth()->id() !== $comment->user_id) {
        return back()->with('error', 'Anda tidak diizinkan menghapus komentar ini!');
    }

    $comment->delete();

    return back()->with('success', 'Komentar berhasil dihapus');
}

public function toggleLike(Comment $comment)
{
    $userId = auth()->id();
    
    // Cek apakah user sudah like sebelumnya
    $like = $comment->likes()->where('user_id', $userId)->first();

    if ($like) {
        $like->delete(); // Jika sudah ada, hapus like (unlike)
    } else {
        $comment->likes()->create(['user_id' => $userId]); // Jika belum, tambah like
    }

    return back();
}
}