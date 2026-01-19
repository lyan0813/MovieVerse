<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
    public function index(Request $request)
{
    // Ambil input perPage jika ingin dinamis, jika tidak tetap 12
    $perPage = $request->input('perPage', 12);
    $searchTerm = $request->search;

    $query = Film::with(['genres', 'country', 'actors']);

    // Filter Pencarian (Judul atau Aktor)
    if ($request->filled('search')) {
        $query->where(function($q) use ($searchTerm) {
            $q->where('title', 'like', "%{$searchTerm}%")
              ->orWhereHas('actors', function($queryAktor) use ($searchTerm) {
                  $queryAktor->where('name', 'like', "%{$searchTerm}%");
              });
        });
    }

    // Filter Genre
    if ($request->filled('genre')) {
        $query->whereHas('genres', function($q) use ($request) {
            $q->where('genres.id', $request->genre);
        });
    }

    // Filter Negara
    if ($request->filled('country')) {
        $query->where('country_id', $request->country);
    }

    // Eksekusi hanya satu kali dengan pagination
    $films = $query->orderBy('year', 'desc')
                   ->paginate($perPage)
                   ->withQueryString(); 
    
    return view('user.films.index', compact('films'));
}

    public function show(Film $film)
    {
        $film->load([
        'genres',
        'country',
        'actors',
        'comments.user'
    ]);

        return view('user.films.show', compact('film'));

    }

    
    public function create()
    {
        
    }

    public function store(Request $request)
    {

    }

    public function edit(Film $film)
    {
        
    }

    public function update(Request $request, Film $film)
    {

    }

    public function destroy(Film $film)
    {
        
    }
}