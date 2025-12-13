@extends('layouts.app')

@section('content')
<div style="max-width: 700px; margin: 40px auto; padding: 0 20px; font-family: sans-serif;">

    {{-- Card Wrapper --}}
    <div style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 12px; overflow: hidden; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);">
        
        {{-- Header Biru/Judul --}}
        <div style="background-color: #f9fafb; padding: 30px; border-bottom: 1px solid #e5e7eb; text-align: center;">
            <div style="font-size: 12px; text-transform: uppercase; letter-spacing: 1px; color: #6b7280; margin-bottom: 10px;">Detail Mahasiswa</div>
            <h1 style="margin: 0; font-size: 32px; font-weight: 800; color: #111827;">{{ $mahasiswa->nama }}</h1>
            <div style="margin-top: 10px;">
                <span style="background-color: #e0e7ff; color: #4338ca; padding: 4px 12px; border-radius: 999px; font-size: 13px; font-weight: 700;">
                    {{ $mahasiswa->fakultas }}
                </span>
            </div>
        </div>

        {{-- List Data --}}
        <div style="padding: 30px;">
            
            <div style="display: flex; justify-content: space-between; padding: 15px 0; border-bottom: 1px solid #f3f4f6;">
                <span style="color: #6b7280; font-weight: 500;">NIM</span>
                <span style="color: #111827; font-weight: 600; font-family: monospace; font-size: 16px;">{{ $mahasiswa->nim }}</span>
            </div>

            <div style="display: flex; justify-content: space-between; padding: 15px 0; border-bottom: 1px solid #f3f4f6;">
                <span style="color: #6b7280; font-weight: 500;">Fakultas</span>
                <span style="color: #111827; font-weight: 600;">{{ $mahasiswa->fakultas }}</span>
            </div>

            <div style="display: flex; justify-content: space-between; padding: 15px 0; border-bottom: 1px solid #f3f4f6;">
                <span style="color: #6b7280; font-weight: 500;">Terdaftar Sejak</span>
                <span style="color: #374151;">{{ $mahasiswa->created_at->format('d M Y, H:i') }}</span>
            </div>

            <div style="display: flex; justify-content: space-between; padding: 15px 0;">
                <span style="color: #6b7280; font-weight: 500;">Terakhir Diupdate</span>
                <span style="color: #374151;">{{ $mahasiswa->updated_at->format('d M Y, H:i') }}</span>
            </div>

        </div>

        {{-- Footer Buttons --}}
        <div style="background-color: #f9fafb; padding: 20px 30px; border-top: 1px solid #e5e7eb; display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('mahasiswas.index') }}" 
                style="color: #4b5563; text-decoration: none; font-weight: 600; font-size: 14px;">
                &larr; Kembali
            </a>

            <a href="{{ route('mahasiswas.edit', $mahasiswa) }}" 
                style="background-color: #f59e0b; color: white; padding: 10px 24px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 14px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                Edit Data
            </a>
        </div>

    </div>
</div>
@endsection