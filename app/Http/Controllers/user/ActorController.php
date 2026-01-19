<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index(Request $request)
    {
        $query = Actor::query();

        if ($request->search) {
            $query->where('name', 'like', "%{$request->search}%");
        }

        $actors = $query->paginate(12);
        return view('user.actors.index', compact('actors'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show(Actor $actor)
    {
        $actor->load('films');
        return view('user.actors.show', compact('actor'));
    }

    public function edit(Actor $actor)
    {
        
    }

    public function update(Request $request, Actor $actor)
    {
        
    }

    public function destroy(Actor $actor)
    {
        
    }
}