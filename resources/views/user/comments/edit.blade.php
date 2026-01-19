@extends('layouts.user') {{-- Sesuaikan dengan layout Anda --}}

@section('content')
<div class="container" style="padding: 50px; color: white;">
    <h1>Edit Komentar</h1>

    <form action="{{ route('comments.update', $comment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <textarea name="comment" style="width: 100%; background: #1a1a1a; color: white; border: 1px solid #333; border-radius: 12px; padding: 15px; margin-bottom: 20px; min-height: 120px;">{{ $comment->comment }}</textarea>
        
        <div style="display: flex; gap: 10px;">
            <button type="submit" style="background: #e50914; color: white; border: none; padding: 10px 25px; border-radius: 10px; cursor: pointer; font-weight: 600;">Update</button>
            <a href="{{ url()->previous() }}" style="background: #333; color: white; padding: 10px 25px; border-radius: 10px; text-decoration: none; font-size: 0.9rem;">Batal</a>
        </div>
    </form>
</div>
@endsection