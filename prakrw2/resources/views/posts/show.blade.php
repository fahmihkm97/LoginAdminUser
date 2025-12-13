@extends('layouts.app')

@section('content')
<div style="max-width: 800px; margin: 40px auto; padding: 0 20px; font-family: sans-serif;">

    {{-- KARTU UTAMA --}}
    <div style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 12px; overflow: hidden; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);">
        
        {{-- Header Artikel --}}
        <div style="padding: 40px; background-color: #f9fafb; border-bottom: 1px solid #f3f4f6; text-align: center;">
            <div style="font-size: 14px; color: #6b7280; margin-bottom: 10px; text-transform: uppercase; letter-spacing: 1px;">
                Artikel • {{ $post->created_at->format('d M Y') }}
            </div>
            
            <h1 style="font-size: 36px; font-weight: 900; color: #111827; margin: 0 0 20px 0; line-height: 1.2;">
                {{ $post->title }}
            </h1>

            <div style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                <div style="width: 40px; height: 40px; background: #e0e7ff; color: #4338ca; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                    {{ substr($post->user->name ?? 'A', 0, 1) }}
                </div>
                <div style="text-align: left;">
                    <div style="font-weight: bold; color: #111827; font-size: 14px;">{{ $post->user->name ?? 'Tidak diketahui' }}</div>
                    <div style="font-size: 12px; color: #6b7280;">Penulis</div>
                </div>
            </div>
        </div>

        {{-- Isi Konten --}}
        <div style="padding: 40px; color: #374151; line-height: 1.8; font-size: 18px; white-space: pre-wrap;">
            {{ $post->content }}
        </div>

        {{-- Footer & Tombol --}}
        <div style="padding: 20px 40px; background-color: #f9fafb; border-top: 1px solid #e5e7eb; display: flex; justify-content: space-between; align-items: center;">
            
            <a href="{{ route('posts.index') }}" 
                style="color: #4b5563; text-decoration: none; font-weight: 600; display: flex; align-items: center;">
                Kembali
            </a>

            {{-- Logika Auth & Admin --}}
            @auth
                @if(Auth::id() == $post->user_id || Auth::user()->is_admin == 1)
                    <div style="display: flex; gap: 10px;">
                        
                        {{-- Tombol Edit --}}
                        <a href="{{ route('posts.edit', ['post' => $post->id]) }}" 
                            style="background-color: #f59e0b; color: white; padding: 10px 20px; border-radius: 6px; text-decoration: none; font-weight: bold; font-size: 14px;">
                            Edit
                        </a>

                        {{-- Form Hapus --}}
                        <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" 
                                method="POST" 
                                onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    style="background-color: #dc2626; color: white; padding: 10px 20px; border-radius: 6px; border: none; font-weight: bold; font-size: 14px; cursor: pointer;">
                                Hapus
                            </button>
                        </form>
                    </div>
                @endif
            @endauth

        </div>

    </div>

</div>
@endsection