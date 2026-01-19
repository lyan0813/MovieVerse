@extends('layouts.admin')

@section('content')

@if ($errors->any())
    <div style="background:#ffe0e0;padding:10px;border-radius:6px;margin-bottom:20px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>⚠️ {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="page-header">
    <div>
        <h2>Edit Film</h2>
        <p>Perbarui data film yang sudah ada</p>
    </div>
</div>

<div class="table-wrapper form-wrapper">
    <form action="{{ route('admin.films.update', $film->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="title"
                   value="{{ old('title', $film->title) }}"
                   required>
        </div>

        <div class="form-group">
            <label>Sutradara</label>
            <input type="text" name="director"
                   value="{{ old('director', $film->director) }}"
                   required>
        </div>

        <div class="form-group">
            <label>Tahun</label>
            <input type="number" name="year"
                   value="{{ old('year', $film->year) }}"
                   required>
        </div>

        <div class="form-group">
            <label>Durasi (menit)</label>
            <input type="number" name="duration"
                   value="{{ old('duration', $film->duration) }}">
        </div>

        <div class="form-group">
            <label>Negara</label>
            <select name="country_id" required>
                <option value="" disabled>-- Pilih Negara --</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}"
                        {{ old('country_id', $film->country_id) == $country->id ? 'selected' : '' }}>
                        {{ $country->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Genre</label>
            <div style="margin-top:10px;display:grid;grid-template-columns:repeat(auto-fill,minmax(150px,1fr));gap:10px;">
                @foreach($genres as $g)
                    <label style="font-weight:normal;cursor:pointer;">
                        <input type="checkbox"
                               name="genre_ids[]"
                               value="{{ $g->id }}"
                               {{ in_array(
                                    $g->id,
                                    old('genre_ids', $film->genres->pluck('id')->toArray())
                                ) ? 'checked' : '' }}>
                        {{ $g->name }}
                    </label>
                @endforeach
            </div>
        </div>

<div class="form-group">
    <label>Actors</label>
    <div style="margin-top: 10px; display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 15px; max-height: 300px; overflow-y: auto; padding: 15px; border: 1px solid #ddd; border-radius: 8px; background: #f9f9f9;">
        @foreach($actors as $actor)
            <label style="display: flex; align-items: center; gap: 12px; font-weight: normal; cursor: pointer; padding: 8px; border-radius: 6px; transition: background 0.2s; border: 1px solid transparent;" 
                   onmouseover="this.style.background='#eee'" 
                   onmouseout="this.style.background='transparent'">
                
                <input type="checkbox" name="actor_ids[]" value="{{ $actor->id }}"
                    {{ in_array(
                        $actor->id,
                        old('actor_ids', $film->actors->pluck('id')->toArray())
                    ) ? 'checked' : '' }}>
                
                @if($actor->photo)
                    <img src="{{ asset('storage/'.$actor->photo) }}" 
                         style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover; border: 2px solid #fff; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                @else
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($actor->name) }}&background=random&color=fff" 
                         style="width: 40px; height: 40px; border-radius: 50%;">
                @endif

                <span style="font-size: 0.95rem; color: #333;">{{ $actor->name }}</span>
            </label>
        @endforeach
    </div>
    <small style="color: #666; display: block; margin-top: 5px;">Ceklis aktor yang membintangi film ini.</small>
</div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" rows="4" required>{{ old('description', $film->description) }}</textarea>
        </div>

        <div class="form-group">
            <label>Poster Film</label>
            <input type="file" name="poster" accept="image/*">

            @if($film->poster)
                <div style="margin-top:10px;">
                    <img src="{{ asset('storage/'.$film->poster) }}"
                         width="120"
                         style="border-radius:8px;">
                </div>
            @endif
        </div>

        <div class="form-group">
    <label>Video Trailer</label>
    <input type="file" name="trailer" accept="video/mp4,video/*">
    
    @if($film->trailer)
        <div style="margin-top:10px;">
            <video width="200" controls style="border-radius: 8px;">
                <source src="{{ asset('storage/'.$film->trailer) }}" type="video/mp4">
            </video>
            <p style="font-size: 12px; color: #666;">Trailer saat ini sudah terpasang</p>
        </div>
    @endif
</div>

        <div class="form-actions">
            <button type="submit" class="btn-primary">UPDATE FILM</button>
            <a href="{{ route('admin.films.index') }}"
               class="btn-primary"
               style="background:#6c757d;">⬅ Kembali</a>
        </div>

    </form>
</div>

@endsection