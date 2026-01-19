@extends('layouts.admin')

@section('content')

{{-- Menampilkan Error Validasi --}}
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
        <h2>Tambah Film</h2>
        <p>Tambahkan data film baru ke dalam sistem</p>
    </div>
</div>

<div class="table-wrapper form-wrapper">
    <form action="{{ route('admin.films.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="title" value="{{ old('title') }}" placeholder="Masukkan judul film" required>
        </div>

        <div class="form-group">
            <label>Sutradara</label>
            <input type="text" name="director" value="{{ old('director') }}" placeholder="Nama sutradara" required>
        </div>

        <div class="form-group">
            <label>Tahun</label>
            <input type="number" name="year" value="{{ old('year') }}" placeholder="Contoh: 2024" required>
        </div>

        <div class="form-group">
            <label>Durasi (menit)</label>
            <input type="number" name="duration" value="{{ old('duration') }}" placeholder="Contoh: 120">
        </div>

        <div class="form-group">
            <label>Negara</label>
            <select name="country_id" required>
                <option value="" disabled selected>-- Pilih Negara --</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
                        {{ $country->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Genre</label>
            <div style="margin-top: 10px; display: grid; grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); gap: 10px;">
                @foreach($genres as $g)
                    <label style="font-weight: normal; cursor: pointer;">
                        <input type="checkbox" name="genre_ids[]" value="{{ $g->id }}" 
                               {{ is_array(old('genre_ids')) && in_array($g->id, old('genre_ids')) ? 'checked' : '' }}>
                        {{ $g->name }}
                    </label>
                @endforeach
            </div>
        </div>

        <div class="form-group">
    <label>Actors</label>
    <div style="margin-top: 10px; display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 15px; max-height: 300px; overflow-y: auto; padding: 10px; border: 1px solid #ddd; border-radius: 8px; background: #f9f9f9;">
        @foreach($actors as $actor)
            <label style="display: flex; align-items: center; gap: 10px; font-weight: normal; cursor: pointer; padding: 5px; border-radius: 5px; transition: background 0.2s;">
                <input type="checkbox" name="actor_ids[]" value="{{ $actor->id }}"
                       {{ is_array(old('actor_ids')) && in_array($actor->id, old('actor_ids')) ? 'checked' : '' }}>
                
                @if($actor->photo)
                    <img src="{{ asset('storage/'.$actor->photo) }}" 
                         style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover; border: 1px solid #ccc;">
                @else
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($actor->name) }}&background=random" 
                         style="width: 35px; height: 35px; border-radius: 50%;">
                @endif

                <span style="font-size: 0.9rem;">{{ $actor->name }}</span>
            </label>
        @endforeach
    </div>
    <small style="color: #666; display: block; margin-top: 5px;">Pilih aktor yang berperan dalam film ini.</small>
</div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" rows="4" placeholder="Tuliskan ringkasan alur cerita..." required>{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label>Poster Film</label>
            <input type="file" name="poster" accept="image/*">
        </div>

        <div class="form-group">
    <label>Video Trailer</label>
    <input type="file" name="trailer" accept="video/mp4,video/x-m4v,video/*">
    <small style="color: #666;">Format: MP4, Max: 50MB (Saran)</small>
</div>

        <div class="form-actions">
            <button type="submit" class="btn-primary">SIMPAN FILM</button>
            <a href="{{ route('admin.films.index') }}" class="btn-primary" style="background: #6c757d;">⬅ Kembali</a>
        </div>

    </form>
</div>

@endsection