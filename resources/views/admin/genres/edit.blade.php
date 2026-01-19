@extends('layouts.admin')

@section('content')
<div class="page-header">
    <div>
<h2>Edit Genre</h2>
</div>
</div>

<div class="table-wrapper form-wrapper">
<form method="POST" action="{{ route('admin.genres.update',$genre->id) }}">
@csrf @method('PUT')
<div class="form-group">
<input type="text" name="name" value="{{ $genre->name }}">
 </div>
<div class="form-actions">
            <button type="submit" class="btn-primary">SIMPAN</button>
            <a href="{{ route('admin.genres.index') }}" class="btn-primary" style="background: #6c757d;">⬅ Kembali</a>
        </div>
    </form>
@endsection