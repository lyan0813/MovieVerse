@extends('layouts.user')

@section('content')

<style>
    /* Hero Section: Poster & Detail Utama */
    .film-header {
        display: flex;
        gap: 40px;
        background: rgba(255, 255, 255, 0.03);
        padding: 40px;
        border-radius: 24px;
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        margin-bottom: 40px;
    }

    .poster-img {
        width: 300px;
        height: 450px;
        object-fit: cover;
        border-radius: 16px;
        box-shadow: 0 20px 50px rgba(0,0,0,0.7);
    }

    .film-details {
        flex: 1;
        color: #fff;
    }

    .film-details h1 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 5px;
        background: linear-gradient(to right, #fff, #aaa);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .meta-info {
        display: flex;
        gap: 15px;
        color: rgba(255, 255, 255, 0.6);
        font-size: 0.95rem;
        margin-bottom: 25px;
    }

    .meta-info span {
        background: rgba(255, 255, 255, 0.1);
        padding: 4px 12px;
        border-radius: 50px;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .description {
        line-height: 1.8;
        color: rgba(255, 255, 255, 0.8);
        font-size: 1.1rem;
        margin-bottom: 30px;
    }

    /* Bagian Aktor (Cast) */
    .section-title {
        color: #fff;
        font-size: 1.5rem;
        margin: 40px 0 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .actor-scroll {
        display: flex;
        gap: 15px;
        overflow-x: auto;
        padding-bottom: 15px;
    }

    .actor-chip {
        background: rgba(255, 255, 255, 0.05);
        color: #fff;
        padding: 10px 20px;
        border-radius: 12px;
        text-decoration: none;
        border: 1px solid rgba(255, 255, 255, 0.1);
        white-space: nowrap;
        transition: 0.3s;
    }

    .actor-chip:hover {
        background: #fff;
        color: #000;
    }

    /* Bagian Komentar */
    .comment-card {
        background: rgba(255, 255, 255, 0.03);
        padding: 20px;
        border-radius: 12px;
        margin-bottom: 15px;
        border-left: 4px solid rgba(255, 255, 255, 0.2);
    }

    .comment-user {
        font-weight: 700;
        color: #fff;
        margin-bottom: 5px;
        display: block;
    }

    textarea {
        width: 100%;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 12px;
        padding: 15px;
        color: #fff;
        margin-bottom: 10px;
        resize: vertical;
    }

    .btn-submit {
        background: #fff;
        color: #000;
        border: none;
        padding: 10px 25px;
        border-radius: 50px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-submit:hover {
        transform: scale(1.05);
        background: #ddd;
    }

    @media (max-width: 768px) {
        .film-header { flex-direction: column; align-items: center; text-align: center; }
        .poster-img { width: 100%; max-width: 250px; height: auto; }
    }

    .watch-now {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        background: #e50914;
        color: #fff;
        padding: 12px 24px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 700;
        transition: 0.3s;
        margin-top: 10px;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .watch-now:hover {
        background: #f40612;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(229, 9, 20, 0.3);
        color: #fff;
    }

    .netflix-icon {
        font-size: 1.2rem;
    }

    .actor-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        text-decoration: none;
        min-width: 100px;
        transition: 0.3s;
    }

    .actor-img {
        width: 80px;
        height: 80px;
        border-radius: 50%; /* Membuat foto jadi bulat */
        object-fit: cover;
        border: 2px solid rgba(255, 255, 255, 0.1);
        transition: 0.3s;
    }

    .actor-item:hover .actor-img {
        border-color: #e50914;
        transform: scale(1.1);
    }

    .actor-name {
        color: #fff;
        font-size: 0.95rem;
        font-weight: 500;
        text-align: center;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100px;
    }
</style>

<div class="film-header">
    @if($film->poster)
        <img src="{{ asset('storage/'.$film->poster) }}" class="poster-img" alt="{{ $film->title }}">
    @endif

    <div class="film-details">
        <h1>{{ $film->title }}</h1>
        
       <div class="meta-info">
    <span>{{ $film->year }}</span>

    @foreach($film->genres as $g)
        <span class="genre-badge">{{ $g->name }}</span>
    @endforeach

    <span>{{ $film->country->name ?? '-' }}</span>
</div>

        <p class="description">
    <strong>Director:</strong> {{ $film->director }} <br><br>
    {{ $film->description }}
</p>

<div style="margin-bottom: 35px;">
    <p style="color: rgba(255,255,255,0.6); font-size: 0.9rem; margin-bottom: 10px;">
        <i class="fa-solid fa-circle-info"></i> Film ini tersedia untuk ditonton secara resmi:
    </p>
    <a href="https://www.netflix.com/search?q={{ urlencode($film->title) }}" target="_blank" class="watch-now">
        <i class="fa-brands fa-netflix netflix-icon"></i>
        Watch on Netflix
    </a>
</div>
        
        @if($film->trailer) 
<div class="trailer-section" style="margin-bottom: 50px;">
    <h3 style="color: white; font-size: 1.5rem; font-weight: 700; margin-bottom: 20px; text-align: left;">
        Official Trailer
    </h3>
    <div style="width: 100%; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.5); border: 1px solid rgba(255,255,255,0.1); background: #000;">
        <video width="100%" controls controlsList="nodownload">
            <source src="{{ asset('storage/' . $film->trailer) }}" type="video/mp4">
            <source src="{{ asset('storage/' . $film->trailer) }}" type="video/webm">
            Your browser does not support the video tag.
        </video>
    </div>
</div>
@endif
        <h3 class="section-title">Cast / Actors</h3>

@if($film->actors->count())
    <div class="actor-scroll" style="display: flex; gap: 25px; overflow-x: auto; padding: 10px 0;">
        @foreach($film->actors as $actor)
            <a href="{{ route('user.actors.show', ['actor' => $actor->id, 'from_film' => $film->id]) }}" class="actor-item">
                @if($actor->photo)
                    <img src="{{ asset('storage/'.$actor->photo) }}" class="actor-img" alt="{{ $actor->name }}">
                @else
                    {{-- Gambar default jika aktor tidak punya foto --}}
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($actor->name) }}&background=random&color=fff" class="actor-img" alt="{{ $actor->name }}">
                @endif
                <span class="actor-name">{{ $actor->name }}</span>
            </a>
        @endforeach
    </div>
@else
    <p style="color: rgba(255,255,255,0.4)">No cast information available.</p>
@endif

    </div>
</div>

<h3 class="section-title">Comments</h3>
@if ($errors->any())
    <div style="color: red;">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
@auth
    <form action="{{ route('comments.store') }}" method="POST" style="margin-bottom: 30px;">
        @csrf
        <input type="hidden" name="film_id" value="{{ $film->id }}">
        <textarea name="comment" rows="3" placeholder="Apa pendapatmu tentang film ini?" required></textarea>
        <button class="btn-submit">Post Comment</button>
    </form>
@else
    <p style="color: rgba(255,255,255,0.5); margin-bottom: 30px;">
        Silahkan <a href="{{ route('login') }}" style="color: #fff; font-weight: bold;">Login</a> untuk ikut berdiskusi.
    </p>
@endif

@foreach ($film->comments as $comment)
    <div class="comment-card" style="background: rgba(255,255,255,0.05); border-radius: 10px; padding: 15px; margin-bottom: 15px; position: relative;">
        
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <span class="comment-user" style="font-weight: bold; color: #fff;">@ {{ $comment->user->username }}</span>
            
            @if(auth()->check() && auth()->id() == $comment->user_id)
                <div style="display: flex; gap: 15px;">
                    <a href="{{ route('comments.edit', $comment->id) }}" style="color: #ffc107;" title="Edit">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('Hapus komentar?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: none; border: none; color: #ff4d4d; cursor: pointer; padding: 0;">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>
            @endif
        </div>

        <p class="comment-text" style="margin: 10px 0; color: rgba(255,255,255,0.8);">{{ $comment->comment }}</p>

        <div class="like-section">
            <form action="{{ route('comments.like', $comment->id) }}" method="POST">
                @csrf
                <button type="submit" style="background: none; border: none; color: #888; cursor: pointer; padding: 0; display: flex; align-items: center; gap: 5px;">
                    <i class="{{ $comment->likes()->where('user_id', auth()->id())->exists() ? 'fa-solid' : 'fa-regular' }} fa-thumbs-up"></i>
                    <span>{{ $comment->likes()->count() }}</span>
                </button>
            </form>
        </div>
    </div>
@endforeach

<div style="margin-top: 50px; padding-bottom: 50px;">
    <a href="{{ route('user.films.index') }}" style="color: rgba(255,255,255,0.5); text-decoration: none;">← Back to Movies</a>
</div>

@endsection