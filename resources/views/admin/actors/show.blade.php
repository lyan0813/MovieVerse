@extends('layouts.admin')

@section('content')

<div class="page-header">
    <div>
        <h2>Detail Actor</h2>
        <p>Informasi lengkap actor</p>
    </div>
</div>

<div class="table-wrapper actor-detail-card">

    <div class="actor-detail-content">
        <img src="{{ asset('storage/'.$actor->photo) }}" class="actor-photo">

        <div class="actor-info">
            <h3 class="actor-name">{{ $actor->name }}</h3>
            <p><strong>Gender:</strong> {{ ucfirst($actor->gender) }}</p>
            <p><strong>Tanggal Lahir:</strong> {{ \Carbon\Carbon::parse($actor->birthdate)->format('d M Y') }}</p>
    
    <h4 style="margin-top: 25px; border-bottom: 2px solid #eee; padding-bottom: 10px;">
        Film yang dibintangi:
    </h4>

<div class="film-grid">
        @forelse($actor->films as $film)
            <a href="{{ route('admin.films.show', $film->id) }}" class="film-item">
                @if($film->poster)
                    <img src="{{ asset('storage/'.$film->poster) }}" class="mini-poster" alt="{{ $film->title }}">
                @else
                    {{-- Placeholder jika film tidak punya poster --}}
                    <div class="mini-poster" style="background: #eee; display: flex; align-items: center; justify-content: center; color: #999; font-size: 0.8rem;">
                        No Poster
                    </div>
                @endif
                <span>{{ $film->title }}</span>
                <small style="color: #888;">({{ $film->year }})</small>
            </a>
        @empty
            <p style="color: #999; grid-column: 1 / -1;">Belum ada film yang tercatat untuk aktor ini.</p>
        @endforelse
    </div>
</div>
    

    <div class="actor-actions">
        <a href="{{ route('admin.actors.index') }}" class="btn-primary">
            ← Kembali
        </a>
    </div>

</div>

@endsection