<?php

namespace App\Providers;

use App\Models\Genre;
use App\Models\Country;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Bagikan data ke semua file .blade.php
    View::share('globalGenres', Genre::orderBy('name')->get());
    View::share('globalCountries', Country::orderBy('name')->get());
    }
}
