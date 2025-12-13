@extends('layouts.app')

@section('content')
<div style="max-width: 700px; margin: 40px auto; padding: 0 20px; font-family: sans-serif;">

    <h1 style="font-size: 24px; font-weight: 800; color: #111827; margin-bottom: 20px; text-align: center;">Buat Post Baru</h1>

    {{-- Error Handling --}}
    @if ($errors->any())
        <div style="background-color: #fee2e2; border: 1px solid #ef4444; color: #b91c1c; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Container --}}
    <div style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 12px; padding: 30px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);">
        
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            {{-- Input Judul --}}
            <div style="margin-bottom: 20px;">
                <label for="title" style="display: block; font-weight: 600; margin-bottom: 8px; color: #374151;">Judul Post</label>
                <input 
                    type="text" 
                    id="title" 
                    name="title" 
                    value="{{ old('title') }}"
                    placeholder="Masukkan judul menarik..."
                    style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 16px; box-sizing: border-box;"
                    required>
            </div>

            {{-- Input Konten --}}
            <div style="margin-bottom: 30px;">
                <label for="content" style="display: block; font-weight: 600; margin-bottom: 8px; color: #374151;">Isi Konten</label>
                <textarea 
                    id="content" 
                    name="content" 
                    rows="8"
                    placeholder="Tulis cerita anda..."
                    style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 16px; line-height: 1.5; box-sizing: border-box;"
                    required>{{ old('content') }}</textarea>
            </div>

            {{-- Tombol Aksi --}}
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <a href="{{ route('posts.index') }}" 
                   style="color: #4b5563; text-decoration: none; font-weight: 500; padding: 10px 20px; background: #f3f4f6; border-radius: 6px;">
                   Batal
                </a>

                <button type="submit" 
                        style="background-color: #000000; color: #ffffff; padding: 12px 30px; border-radius: 8px; border: none; font-weight: bold; cursor: pointer; font-size: 14px;">
                    Simpan Post
                </button>
            </div>

        </form>
    </div>

</div>
@endsection