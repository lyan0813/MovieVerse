@extends('layouts.admin')

@section('content')

<div class="page-header">
    <div>
        <h2>Detail Film</h2>
        <p>Informasi lengkap film</p>
    </div>
</div>

<div class="table-wrapper film-detail-card">

    <div class="film-detail-content">
        <img src="{{ asset('storage/'.$film->poster) }}" class="film-poster">

        <div class="film-info">
            <h3 class="film-title">{{ $film->title }}</h3>

            <p><strong>Sutradara:</strong> {{ $film->director }}</p>
            <p><strong>Tahun:</strong> {{ $film->year }}</p>
            <p><strong>Durasi:</strong> {{ $film->duration }} menit</p>
            <p><strong>Negara:</strong> {{ $film->country->name }}</p>
            <p><strong>Genre:</strong> {{ $film->genres->pluck('name')->join(', ') }}</p>

            <p class="film-description">{{ $film->description }}</p>

            <div style="margin-top: 25px; border-top: 1px solid #eee; padding-top: 20px;">
                <h4 style="margin-bottom: 15px; color: #333;">Official Trailer</h4>
                @if($film->trailer)
                    <video width="100%" style="max-width: 500px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);" controls>
                        <source src="{{ asset('storage/'.$film->trailer) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                @else
                    <div style="padding: 20px; background: #f9f9f9; border-radius: 8px; color: #999; font-style: italic; border: 1px dashed #ccc;">
                        Belum ada trailer yang diunggah untuk film ini.
                    </div>
                @endif
            </div>
        </div>
    </div>

<div style="margin-top: 40px; padding: 0 20px;">
    <h4 style="border-bottom: 2px solid #e50914; display: inline-block; padding-bottom: 5px; margin-bottom: 20px;">
        Komentar User ({{ $film->comments->count() }})
    </h4>

    @forelse($film->comments as $comment)
        <div class="comment" style="background: #f8f9fa; padding: 15px; border-radius: 8px; margin-bottom: 15px; border-left: 4px solid #e50914; display: flex; justify-content: space-between; align-items: flex-start;">
            
            <div style="flex: 1;">
                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 5px;">
                    <strong style="color: #333;">{{ $comment->user->username }}</strong>
                    <small style="color: #aaa; font-size: 0.8rem;">• {{ $comment->created_at->diffForHumans() }}</small>
                </div>
                {{-- Gunakan $comment->comment atau $comment->content sesuai nama kolom di DB Anda --}}
                <p style="margin: 0; color: #555; line-height: 1.5;">{{ $comment->comment }}</p>
            </div>

            <div style="margin-left: 20px;">
                <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus komentar ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background: #fff; border: 1px solid #ff4d4d; color: #ff4d4d; padding: 5px 10px; border-radius: 4px; cursor: pointer; font-size: 0.8rem; transition: 0.3s;" onmouseover="this.style.background='#ff4d4d'; this.style.color='#fff'" onmouseout="this.style.background='#fff'; this.style.color='#ff4d4d'">
                        <i class="fa fa-trash"></i> Hapus
                    </button>
                </form>
            </div>
        </div>
    @empty
        <div style="text-align: center; padding: 30px; background: #f9f9f9; border-radius: 8px; color: #999;">
            <i class="fa-regular fa-comments" style="font-size: 2rem; margin-bottom: 10px; display: block;"></i>
            Belum ada komentar untuk film ini.
        </div>
    @endforelse
</div>

    <div class="film-actions" style="margin-top: 30px; padding: 20px; border-top: 1px solid #eee;">
        <a href="{{ route('admin.films.index') }}" class="btn-primary">
            ← Kembali
        </a>
    </div>

</div>

@endsection