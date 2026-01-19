@extends('layouts.user')

@section('content')

<style>
    /* Container Profil Utama */
    .actor-container {
        display: flex;
        gap: 40px;
        background: rgba(255, 255, 255, 0.03);
        padding: 40px;
        border-radius: 24px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        margin-bottom: 50px;
    }

    .actor-profile-img {
        width: 280px;
        height: 400px;
        object-fit: cover;
        border-radius: 16px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.6);
    }

    .actor-info {
        flex: 1;
        color: #fff;
    }

    .actor-info h1 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 10px;
        background: linear-gradient(to right, #fff, #888);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .info-grid {
        display: grid;
        grid-template-columns: 120px 1fr;
        gap: 15px;
        margin-top: 20px;
    }

    .info-label {
        color: rgba(255, 255, 255, 0.4);
        font-weight: 500;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 1px;
    }

    /* Bagian Daftar Film */
    .section-divider {
        margin: 40px 0 25px;
        font-size: 1.5rem;
        font-weight: 700;
        color: #fff;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .section-divider::after {
        content: "";
        height: 1px;
        background: rgba(255, 255, 255, 0.1);
        flex: 1;
    }

    .film-grid-small {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
        gap: 20px;
    }

    .film-item {
        text-decoration: none;
        transition: 0.3s;
    }

    .film-item img {
        width: 100%;
        aspect-ratio: 2/3;
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 8px;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .film-item:hover {
        transform: translateY(-8px);
    }

    .film-item p {
        color: #fff;
        font-size: 0.9rem;
        margin: 0;
        font-weight: 500;
        text-align: center;
    }

    /* Tombol Kembali */
    .btn-back {
        display: inline-flex;
        align-items: center;
        padding: 10px 20px;
        color: rgba(255, 255, 255, 0.6);
        text-decoration: none;
        font-size: 0.9rem;
        transition: 0.3s;
        margin-bottom: 20px;
    }

    .btn-back:hover {
        color: #fff;
    }

    @media (max-width: 768px) {
        .actor-container { flex-direction: column; align-items: center; text-align: center; padding: 20px; }
        .info-grid { grid-template-columns: 1fr; }
    }
</style>

<div class="navigation-back" style="margin-bottom: 20px;">
    @if(request()->has('from_film'))
        <a href="{{ route('user.films.show', request('from_film')) }}" style="color: #e50914; text-decoration: none;">
            <i class="fa-solid fa-arrow-left"></i> Back to Movie
        </a>
    @else
        <a href="{{ route('user.actors.index') }}" style="color: #888; text-decoration: none;">
            <i class="fa-solid fa-arrow-left"></i> Back to All Actors
        </a>
    @endif
</div>

<div class="actor-container">
    <img src="{{ asset('storage/'.$actor->photo) }}" class="actor-profile-img" alt="{{ $actor->name }}">

    <div class="actor-info">
        <h1>{{ $actor->name }}</h1>
        
        <div class="info-grid">
            <div class="info-label">Gender</div>
            <div>{{ $actor->gender == 'male' ? 'Laki-laki' : 'Perempuan' }}</div>

            <div class="info-label">Lahir</div>
            <div>{{ \Carbon\Carbon::parse($actor->birthdate)->translatedFormat('d F Y') }}</div>

            <div class="info-label">Umur</div>
            <div>{{ \Carbon\Carbon::parse($actor->birthdate)->age }} Tahun</div>
        </div>
    </div>
</div>

<h2 class="section-divider">Filmografi</h2>

@if($actor->films->count() > 0)
    <div class="film-grid-small">
        @foreach($actor->films as $film)
            <a href="{{ route('user.films.show', $film->id) }}" class="film-item">
                <img src="{{ asset('storage/'.$film->poster) }}" alt="{{ $film->title }}">
                <p>{{ $film->title }}</p>
            </a>
        @endforeach
    </div>
@else
    <p style="color: rgba(255,255,255,0.5); font-style: italic;">Aktor ini belum memiliki daftar film.</p>
@endif

@endsection