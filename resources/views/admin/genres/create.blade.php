@extends('layouts.admin')

@section('content')
<div class="page-header">
    <div>
        <h2>Tambah Genre</h2>
        <p>Tambahkan genre film baru ke dalam sistem</p>
    </div>
</div>

<div class="table-wrapper form-wrapper">
<form method="POST" action="{{ route('admin.genres.store') }}">
@csrf
<div class="form-group">
            <input type="text" name="genre" value="{{ old('genre') }}" placeholder="Masukkan nama genre" required>
        </div>
<div class="form-actions">
            <button type="submit" class="btn-primary">SIMPAN</button>
            <a href="{{ route('admin.genres.index') }}" class="btn-primary" style="background: #6c757d;">⬅ Kembali</a>
        </div>
</form>
</div>
@endsection