@extends('layouts.admin')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <h1 style="margin: 0;">Dashboard Admin</h1>
    </div>

    <div class="cards">
        <div class="card">
            <h3>Total Film</h3>
            <p>{{ $filmCount }}</p>
        </div>

        <div class="card">
            <h3>Total Actor</h3>
            <p>{{ $actorCount }}</p>
        </div>

        <div class="card">
            <h3>Total Genre</h3>
            <p>{{ $genreCount }}</p>
        </div>

        <div class="card">
            <h3>Total Country</h3>
            <p>{{ $countryCount }}</p>
        </div>
    </div>
@endsection