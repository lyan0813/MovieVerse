@extends('layouts.admin')

@section('content')

<div class="page-header">
    <div>
        <h2>Data Country</h2>
        <p>Manajemen data negara</p>
    </div>

    <a href="{{ route('admin.countries.create') }}" class="btn-primary">
        + Tambah Country
    </a>
</div>

<div class="table-toolbar">
    <div></div>

    <div class="search-box">
        <form action="{{ route('admin.countries.index') }}" method="GET">
            <input
                type="text"
                name="search"
                placeholder="Cari country..."
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
                <th>Nama Country</th>
                <th width="120">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($countries as $country)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $country->name }}</td>
                <td class="action-btns">
                    <a href="{{ route('admin.countries.edit', $country->id) }}" class="btn-edit">✏</a>

                    <form action="{{ route('admin.countries.destroy', $country->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn-delete" onclick="return confirm('Hapus country ini?')">🗑</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" style="text-align:center;">Data country belum tersedia</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="table-footer">
        <div class="info">
            Showing {{ $countries->count() }} of {{ $countries->total() }} entries
        </div>

        <div class="pagination">
            {{ $countries->links() }}
        </div>
    </div>
</div>

@endsection