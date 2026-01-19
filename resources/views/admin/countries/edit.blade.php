@extends('layouts.admin')

@section('content')
<div class="page-header">
    <div>
<h2>Edit Country</h2>
</div>
</div>

<div class="table-wrapper form-wrapper">
<form method="POST" action="{{ route('admin.countries.update',$country->id) }}">
@csrf @method('PUT')
<div class="form-group">
<input type="text" name="name" value="{{ $country->name }}">
 </div>
<div class="form-actions">
            <button type="submit" class="btn-primary">SIMPAN</button>
            <a href="{{ route('admin.countries.index') }}" class="btn-primary" style="background: #6c757d;">⬅ Kembali</a>
        </div>
    </form>
@endsection