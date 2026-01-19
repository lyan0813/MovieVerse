<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Actor;
use App\Models\Genre;
use App\Models\Country;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index', [
            'filmCount' => Film::count(),
            'actorCount' => Actor::count(),
            'genreCount' => Genre::count(),
            'countryCount' => Country::count(),
        ]);

    }
}
