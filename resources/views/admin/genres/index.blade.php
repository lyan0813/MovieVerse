@extends('layouts.admin')

@section('content')

<div class="page-header">
    <div>
        <h2>Data Genre</h2>
        <p>Manajemen data genre</p>
    </div>

    <a href="{{ route('admin.genres.create') }}" class="btn-primary">
        + Tambah Genre
    </a>
</div>

<div class="table-toolbar">
    <div></div>

    <div class="search-box">
        <form action="{{ route('admin.genres.index') }}" method="GET">
            <input
                type="text"
                name="search"
                placeholder="Cari genre..."
                value="{{ request('search') }}"
            >
        </form>
    </div>
</div>

<div class="table-wrapper">
    <table class="data-table">
        <thead>
            <tr>
                <th width="60">No</th>
                <th>Nama Genre</th>
                <th width="120">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($genres as $genre)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $genre->name }}</td>
                <td class="action-btns">
                    <a href="{{ route('admin.genres.edit', $genre->id) }}" class="btn-edit">✏</a>

                    <form action="{{ route('admin.genres.destroy', $genre->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn-delete" onclick="return confirm('Hapus genre ini?')">🗑</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" style="text-align:center;">Data genre belum tersedia</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="table-footer">
        <div class="info">
            Showing {{ $genres->count() }} of {{ $genres->total() }} entries
        </div>

        <div class="pagination">
            {{ $genres->links() }}
        </div>
    </div>
</div>

@endsection