@extends('layouts.admin')

@section('content')

<div class="page-header">
    <div>
        <h2>Data Film</h2>
        <p>Manajemen data film</p>
    </div>

    <a href="{{ route('admin.films.create') }}" class="btn-primary">
        + Tambah Data Film
    </a>
</div>

<div class="table-toolbar">
    <div class="entries">
        Show
        <select onchange="window.location.href = '?perPage=' + this.value + '&search={{ request('search') }}'">
            <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
            <option value="25" {{ request('perPage') == 25 ? 'selected' : '' }}>25</option>
            <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
        </select>
        entries
    </div>

    <div class="search-box">
        <form action="{{ route('admin.films.index') }}" method="GET">
            <input
            type="text" 
            name="search" 
            placeholder="Cari film, sutradara..."
            value="{{ request('search') }}"
            >
        </form>
    </div>

</div>

<div class="table-wrapper">
    <table class="data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Poster</th>
                <th>Trailer</th>
                <th>Sutradara</th>
                <th>Deskripsi</th>
                <th>Tahun</th>
                <th>Durasi</th>
                <th>Genre</th>
                <th>Negara</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
             @foreach ($films as $film)
             <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $film->title }}</td>
                <td>
                    @if($film->poster)
                    <img src="{{ asset('storage/'.$film->poster) }}" width="60" class="poster-img" style="border-radius: 4px;">
                    @else
                    <small>No Image</small>
                    @endif
                </td>
                <td>
    @if($film->trailer)
        <video width="100" height="60" style="border-radius: 4px; background: #000; object-fit: cover;">
            <source src="{{ asset('storage/'.$film->trailer) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    @else
        <div style="width: 100px; height: 60px; background: #eee; border-radius: 4px; display: flex; align-items: center; justify-content: center;">
            <small style="color: #999;">No Video</small>
        </div>
    @endif
</td>
                <td>{{ $film->director }}</td>
                <td class="text-wrap" title="{{ $film->description }}">
                    {{ Str::limit($film->description, 40) }}
                </td>
                <td>{{ $film->year }}</td>
                <td>{{ $film->duration }}m</td>
    
                <td>
                    <span class="badge">
                        {{ $film->genres->pluck('name')->join(', ') ?: '-' }}
                    </span>
                </td>
                
                <td>{{ $film->country->name ?? 'N/A' }}</td>
    
                <td class="action-btns">
                    <a href="{{ route('admin.films.show', $film->id) }}" class="btn-view" title="Detail">👁</a>
                    <a href="{{ route('admin.films.edit', $film->id) }}" class="btn-edit" title="Edit">✏</a>
                    
                    <form action="{{ route('admin.films.destroy', $film->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete" onclick="return confirm('Hapus film ini?')">🗑</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="table-footer">
        <div class="info">
            Showing 1 to {{ count($films) }} of {{ count($films) }} entries
        </div>

        <div class="pagination">
            <button disabled>Previous</button>
            <button class="active">1</button>
            <button>Next</button>
        </div>
    </div>
</div>

@endsection