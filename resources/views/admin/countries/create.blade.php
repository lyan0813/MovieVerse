@extends('layouts.admin')

@section('content')
<div class="page-header">
    <div>
        <h2>Tambah Country</h2>
        <p>Tambahkan country baru ke dalam sistem</p>
    </div>
</div>

<div class="table-wrapper form-wrapper">
<form method="POST" action="{{ route('admin.countries.store') }}">
@csrf
<div class="form-group">
            <input type="text" name="country" value="{{ old('country') }}" placeholder="Masukkan nama country" required>
        </div>
<div class="form-actions">
            <button type="submit" class="btn-primary">SIMPAN</button>
            <a href="{{ route('admin.genres.index') }}" class="btn-primary" style="background: #6c757d;">⬅ Kembali</a>
        </div>
</form>
</div>
@endsection