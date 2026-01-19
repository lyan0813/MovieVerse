<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
    public function index(Request $request)
{
    // 1. Ambil nilai perPage (default 10) dan search
    $perPage = $request->input('perPage', 10);
    $search = $request->input('search');

    // 2. Bangun query dengan Filter Search
    $films = Film::with(['genres', 'country'])
        ->when($search, function($query, $search) {
            return $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('director', 'like', "%{$search}%");
            });
        })
        ->paginate($perPage) // Gunakan variabel $perPage
        ->withQueryString(); // Menjaga agar parameter URL tidak hilang saat pindah halaman

    return view('admin.films.index', compact('films'));
}

    public function create()
    {
        return view('admin.films.create', [
            'genres' => Genre::all(),
            'countries' => Country::all(),
            'actors' => Actor::all(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'director' => 'required',
            'year' => 'required',
            'duration' => 'required',
            'description' => 'required',
            'country_id'  => 'required|exists:countries,id',
            'poster'      => 'nullable|image',
            'genre_ids'   => 'required|array',
            'genre_ids.*' => 'exists:genres,id',
            'actor_ids'   => 'nullable|array',
            'trailer' => 'nullable|mimes:mp4,mov,ogg,qt|max:51200', // max 50MB
    ]);

        if ($request->hasFile('poster')) {
            $data['poster'] = $request->poster->store('posters', 'public');
        }
        
        if ($request->hasFile('trailer')) {
        $data['trailer'] = $request->trailer->store('trailers', 'public');
    }

         $genreIds = $data['genre_ids'];
         unset($data['genre_ids']);
         $actorIds = $data['actor_ids'];
         unset($data['actor_ids']);
         
         $film = Film::create($data);
         $film->genres()->sync($genreIds);
         $film->actors()->sync($actorIds);
         
         return redirect()
         ->route('admin.films.index')
         ->with('success', 'Film berhasil ditambahkan');
    }

    public function show(Film $film)
    {
        return view('admin.films.show', compact('film'));
    }

    public function edit(Film $film)
    {
        return view('admin.films.edit', [
            'film' => $film,
            'genres' => Genre::all(),
            'countries' => Country::all(),
            'actors' => Actor::all(),
        ]);
    }

    public function update(Request $request, Film $film)
    {
        $data = $request->validate([
            'title' => 'required',
            'director' => 'required',
            'year' => 'required',
            'duration' => 'required',
            'description' => 'required',
            'country_id'  => 'required|exists:countries,id',
            'poster'      => 'nullable|image',
            'genre_ids'   => 'required|array',
            'genre_ids.*' => 'exists:genres,id',
            'trailer' => 'nullable|mimes:mp4,mov,ogg,qt|max:51200',
    ]);

    // JIKA ADA POSTER BARU
    if ($request->hasFile('poster')) {

        // HAPUS POSTER LAMA JIKA ADA
        if ($film->poster && \Storage::disk('public')->exists($film->poster)) {
            \Storage::disk('public')->delete($film->poster);
        }

        $data['poster'] = $request->file('poster')->store('posters', 'public');
    }

    if ($request->hasFile('trailer')) {
        // Hapus trailer lama jika ada
        if ($film->trailer) Storage::disk('public')->delete($film->trailer);
        $data['trailer'] = $request->file('trailer')->store('trailers', 'public');
    }

    // AMBIL GENRE
    $genreIds = $request->input('genre_ids', []);
    $actorIds = $request->input('actor_ids', []);

    unset($data['genre_ids'], $data['actor_ids']);

    // UPDATE FILM
    $film->update($data);

        // UPDATE RELASI GENRE
    $film->genres()->sync($genreIds);
    $film->actors()->sync($actorIds);

    return redirect()
        ->route('admin.films.index')
        ->with('success', 'Film berhasil diperbarui');
}

    public function destroy(Film $film)
    {
        Storage::disk('public')->delete($film->poster);
        $film->delete();
        return back();
    }
}