@extends('layouts.user')

@section('content')

<style>
.horizontal-slider {
        display: flex;
        overflow-x: auto;
        gap: 20px;
        padding-bottom: 20px;
        scroll-behavior: smooth;
        scrollbar-width: none;
    }
    .horizontal-slider::-webkit-scrollbar { display: none; }

    .slider-item {
        flex: 0 0 180px; /* Sedikit lebih ramping untuk aktor */
        transition: transform 0.3s;
        text-decoration: none;
    }
    .slider-item:hover { transform: translateY(-10px); }

    /* Highlight Section */
    .highlight-card {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 30px;
        border-left: 5px solid #e50914;
    }

    .section-label {
        font-size: 1.5rem;
        margin: 40px 0 20px;
        color: #fff;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .round-img {
        width: 100%;
        aspect-ratio: 1/1;
        object-fit: cover;
        border-radius: 50%; /* Membuat foto aktor bulat agar kontras dengan poster film */
        border: 2px solid rgba(255,255,255,0.1);
    }
</style>

<div class="section-label">
    <h3>🔥 Film Rilis Terbaru</h3>
</div>

<div class="horizontal-slider">
    @foreach($films->sortByDesc('year')->take(10) as $film)
        <a href="{{ route('user.films.show', $film->id) }}" class="slider-item">
            <div class="film-card">
                <img src="{{ asset('storage/'.$film->poster) }}" style="width: 100%; border-radius: 10px;">
                <div class="film-info">
                    <h4 style="margin: 10px 0 5px; font-size: 0.9rem; color: #fff;">{{ $film->title }}</h4>
                    <small style="color: #aaa;">{{ $film->year }}</small>
                </div>
            </div>
        </a>
    @endforeach
</div>

<div class="section-label">
    <h3>💬 Sedang Ramai Dibicarakan</h3>
</div>

@forelse($films->where('comments_count', '>', 0)->take(3) as $film)
    <div class="highlight-card">
        <div style="display: flex; gap: 20px; align-items: center;">
            <img src="{{ asset('storage/'.$film->poster) }}" width="80" style="border-radius: 8px;">
            <div style="flex: 1;">
                <h3 style="margin: 0; color: #fff;">{{ $film->title }}</h3>
                
                <span style="font-size: 0.75rem; background: #e50914; padding: 2px 8px; border-radius: 10px; color: #fff;">
                    {{ $film->comments_count }} Komentar
                </span>

                @if($film->comments->isNotEmpty())
    @php 
        $lastComment = $film->comments->last(); 
    @endphp
    <p style="color: #eee; font-size: 0.9rem; margin: 10px 0;">
        <strong style="color: #aaa;">
            {{ $lastComment->user->name ?? $lastComment->user->username ?? 'User' }}:
        </strong> 
        <span style="font-style: italic; color: #ccc;">
            "{{ Str::limit($lastComment->comment, 120) }}"
        </span>
    </p>
@endif

                <a href="{{ route('user.films.show', $film->id) }}" style="color: #e50914; text-decoration: none; font-size: 0.8rem; font-weight: bold;">
                    IKUT BERDISKUSI &rarr;
                </a>
            </div>
        </div>
    </div>
@empty
    <div class="highlight-card" style="text-align: center; border-left: none; opacity: 0.6;">
        <p>Belum ada diskusi film saat ini.</p>
    </div>
@endforelse

@endsection