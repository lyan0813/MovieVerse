@extends('layouts.user')

@section('content')

<h1 class="section-title">Our Actors</h1>

<div class="gender-section">
    <span class="gender-label">Male Actors</span>
    <div class="gender-line"></div>
</div>

<div class="actor-grid">
    @forelse($actors->where('gender', 'male') as $actor)
        <a href="{{ route('user.actors.show', $actor->id) }}" class="actor-card">
            <img src="{{ asset('storage/'.$actor->photo) }}" alt="{{ $actor->name }}">
            <div class="actor-info-overlay">
                <h3>{{ $actor->name }}</h3>
            </div>
        </a>
    @empty
        <p style="color: #666;">No male actors found.</p>
    @endforelse
</div>

<div class="gender-section">
    <span class="gender-label">Female Actors</span>
    <div class="gender-line"></div>
</div>

<div class="actor-grid">
    @forelse($actors->where('gender', 'female') as $actor)
        <a href="{{ route('user.actors.show', $actor->id) }}" class="actor-card">
            <img src="{{ asset('storage/'.$actor->photo) }}" alt="{{ $actor->name }}">
            <div class="actor-info-overlay">
                <h3>{{ $actor->name }}</h3>
            </div>
        </a>
    @empty
        <p style="color: #666;">No female actors found.</p>
    @endforelse
</div>


@endsection