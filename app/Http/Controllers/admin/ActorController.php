<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index(Request $request)
    {
        $query = Actor::query();
        if ($request->filled('search')) {
            $query->where('name', 'like', '%'.$request->search.'%');
        }
        
        $search = $request->query('search');
    $perPage = $request->query('perPage', 10); 

    $actors = Actor::when($search, function($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })
        ->paginate($perPage)
        ->withQueryString();
        return view('admin.actors.index', compact('actors'));
    }

    public function create()
    {
        return view('admin.actors.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'birthdate' => 'required|date',
            'gender' => 'required|in:male,female',
            'photo' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('actors', 'public');
        }

        Actor::create($data);
        return redirect()->route('admin.actors.index')->with('success','Actor berhasil ditambahkan');
    }

    /** ✅ SHOW */
    public function show(Actor $actor)
    {
        return view('admin.actors.show', compact('actor'));
    }

    public function edit(Actor $actor)
    {
        return view('admin.actors.edit', compact('actor'));
    }

    public function update(Request $request, Actor $actor)
    {
        $data = $request->validate([
            'name' => 'required',
            'birthdate' => 'required|date',
            'gender' => 'required|in:male,female',
            'photo' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('actors', 'public');
        }

        $actor->update($data);
        return redirect()->route('admin.actors.index')->with('success','Actor berhasil diupdate');
    }

    public function destroy(Actor $actor)
    {
        $actor->delete();
        return redirect()->route('admin.actors.index')->with('success','Actor berhasil dihapus');
    }
}