<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index(Request $request)
    {
        $query = Genre::query();

        if ($request->search) {
            $query->where('name', 'like', '%'.$request->search.'%');
        }

        $genres = $query->paginate(10);
        return view('admin.genres.index', compact('genres'));
    }

    public function create()
    {
        return view('admin.genres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:genres,name'
        ]);

        Genre::create($request->only('name'));

        return redirect()->route('admin.genres.index')
            ->with('success', 'Genre berhasil ditambahkan');
    }

    public function edit(Genre $genre)
    {
        return view('admin.genres.edit', compact('genre'));
    }

    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'name' => 'required|unique:genres,name,'.$genre->id
        ]);

        $genre->update($request->only('name'));

        return redirect()->route('admin.genres.index')
            ->with('success', 'Genre berhasil diperbarui');
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return back()->with('success', 'Genre dihapus');
    }
}