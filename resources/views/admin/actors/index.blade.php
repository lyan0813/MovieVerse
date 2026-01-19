@extends('layouts.admin')

@section('content')

<div class="page-header">
    <div>
        <h2>Data Actor</h2>
        <p>Manajemen data actor</p>
    </div>

    <a href="{{ route('admin.actors.create') }}" class="btn-primary">
        + Tambah Actor
    </a>
</div>


<div class="table-filter">
    <div class="entries">
    <form action="{{ route('admin.actors.index') }}" method="GET" id="entriesForm">
        {{-- Pertahankan parameter pencarian jika ada --}}
        @if(request('search'))
            <input type="hidden" name="search" value="{{ request('search') }}">
        @endif
        
        Show 
        <select name="perPage" onchange="document.getElementById('entriesForm').submit()">
            <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
            <option value="25" {{ request('perPage') == 25 ? 'selected' : '' }}>25</option>
            <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
        </select>
        entries
    </form>
</div>
    <div class="search-box">
        <form action="{{ route('admin.actors.index') }}" method="GET">
            <input
            type="text" 
            name="search" 
            placeholder="Cari actor..."
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
                <th>Nama</th>
                <th>Foto</th>
                <th>Gender</th>
                <th>Tanggal Lahir</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
        @foreach ($actors as $actor)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $actor->name }}</td>
                <td>
                    <img src="{{ asset('storage/'.$actor->photo) }}" class="poster-img">
                </td>
                <td>{{ ucfirst($actor->gender) }}</td>
                <td>{{ $actor->birthdate }}</td>
                <td class="action-btns">
                    <a href="{{ route('admin.actors.show', $actor->id) }}" class="btn-view">👁</a>
                    <a href="{{ route('admin.actors.edit', $actor->id) }}" class="btn-edit">✏</a>
                    <form action="{{ route('admin.actors.destroy', $actor->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete" onclick="return confirm('Yakin ingin menghapus?')">🗑</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="table-footer">
        <div class="info">
            Showing 1 to {{ count($actors) }} of {{ count($actors) }} entries
        </div>

        <div class="pagination">
            <button disabled>Previous</button>
            <button class="active">1</button>
            <button>Next</button>
        </div>
    </div>
</div>

@endsection