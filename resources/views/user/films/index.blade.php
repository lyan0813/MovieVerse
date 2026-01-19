@extends('layouts.user')

@section('content')

<h1 class="section-title">Semua Film</h1>

@foreach($films->groupBy('year')->sortKeysDesc() as $year => $filmsByYear)
    <div class="year-group">
        
        <div class="year-section">
            <span class="year-label">{{ $year }}</span>
            <div class="year-line"></div>
        </div>
        
        <div class="film-grid">
            @foreach($filmsByYear as $film)
                <a href="{{ route('user.films.show', $film->id) }}" class="film-card">
                    <img src="{{ asset('storage/'.$film->poster) }}" alt="{{ $film->title }}">
                    <div class="film-info">
                        <h3 style="font-size: 1rem; margin-top: 10px; color: #fff;">{{ $film->title }}</h3>
                        <p style="color: #aaa; font-size: 0.8rem;">{{ $film->year }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endforeach

@endsection