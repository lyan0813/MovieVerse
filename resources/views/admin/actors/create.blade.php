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
        <h2>Tambah Aktor</h2>
        <p>Tambahkan data aktor atau aktris baru</p>
    </div>
</div>

<div class="table-wrapper form-wrapper">
    <form action="{{ route('admin.actors.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan nama aktor" required>
        </div>

        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="birthdate" value="{{ old('birthdate') }}" required>
        </div>

        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="gender" required>
                <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Laki-laki (Male)</option>
                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Perempuan (Female)</option>
            </select>
        </div>

        <div class="form-group">
            <label>Foto Profil</label>
            <input type="file" name="photo" accept="image/*">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-primary">SIMPAN DATA</button>
            <a href="{{ route('admin.actors.index') }}" class="btn-primary" style="background: #6c757d;">⬅ Kembali</a>
        </div>

    </form>
</div>

@endsection