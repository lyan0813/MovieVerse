@extends('layouts.admin')

@section('content')
<div class="page-header">
    <div>
        <h2>Edit Actor</h2>
        <p>Perbarui data actor</p>
    </div>
</div>

<div class="table-wrapper form-wrapper">

<form action="{{ route('admin.actors.update',$actor->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="name" value="{{ $actor->name }}" required>
    </div>

    <div class="form-group">
        <label>Tanggal Lahir</label>
        <input type="date" name="birthdate" value="{{ $actor->birthdate }}" required>
    </div>

    <div class="form-group">
        <label>Gender</label>
        <select name="gender">
            <option value="male" {{ $actor->gender=='male'?'selected':'' }}>Male</option>
            <option value="female" {{ $actor->gender=='female'?'selected':'' }}>Female</option>
        </select>
    </div>

    <div class="form-group">
        <label>Foto</label>
        <input type="file" name="photo">

        @if($actor->photo)
            <img src="{{ asset('storage/'.$actor->photo) }}" class="preview-img">
        @endif
    </div>

    <div class="form-actions">
        <button class="btn-primary">UPDATE</button>
        <a href="{{ route('admin.actors.index') }}" class="btn-secondary">⬅ Kembali</a>
    </div>

</form>
</div>
@endsection