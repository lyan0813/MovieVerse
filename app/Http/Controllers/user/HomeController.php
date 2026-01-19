<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\Actor; 
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $films = Film::orderBy('year', 'desc')->get();
        
        $films = Film::withCount('comments')
                     ->with(['comments.user'])
                     ->orderBy('comments_count', 'desc')
                     ->get();

        $actors = Actor::all(); 

        return view('user.home', compact('films', 'actors'));
    }
}