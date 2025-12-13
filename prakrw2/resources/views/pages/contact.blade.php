@extends('layouts.app')

@section('content')
<div style="max-width: 700px; margin: 60px auto; padding: 0 20px; font-family: sans-serif;">

    {{-- KARTU UTAMA --}}
    <div style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05); margin-bottom: 30px;">

        {{-- BAGIAN ATAS: Hubungi Kami --}}
        <div style="padding: 50px 40px; text-align: center;">
            
            {{-- Ikon Email (SVG) --}}
            <div style="margin-bottom: 20px;">
                <span style="display: inline-flex; align-items: center; justify-content: center; width: 60px; height: 60px; background-color: #eff6ff; color: #2563eb; border-radius: 50%;">
                    <svg style="width: 30px; height: 30px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </span>
            </div>

            <h1 style="font-size: 32px; font-weight: 900; color: #111827; margin: 0 0 10px 0;">Hubungi Kami</h1>
            <p style="color: #6b7280; font-size: 16px; margin: 0 0 30px 0;">
                Punya pertanyaan? Kirimkan pesan melalui email di bawah ini.
            </p>

            {{-- Kotak Email --}}
            <div style="background-color: #f9fafb; border: 1px dashed #d1d5db; padding: 15px; border-radius: 8px; display: inline-block;">
                <span style="font-size: 18px; font-weight: 600; color: #374151;">
                    📧 fahmihkm76@gmail.com
                </span>
            </div>
        </div>

        {{-- BAGIAN BAWAH: Profil Mahasiswa (Nama & NIM Anda) --}}
        <div style="background-color: #111827; padding: 30px 40px; color: #ffffff;">
            <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 20px;">
                
                {{-- Info Label --}}
                <div style="display: flex; align-items: center; gap: 15px;">
                    <div style="width: 48px; height: 48px; background-color: #374151; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 20px;">
                        👨‍💻
                    </div>
                    <div>
                        <div style="font-size: 12px; text-transform: uppercase; letter-spacing: 1px; color: #9ca3af; margin-bottom: 4px;">Created By</div>
                        <div style="font-size: 18px; font-weight: 700; color: #ffffff;">{{ $nama ?? 'Fahmi Hakim' }}</div>
                    </div>
                </div>

                {{-- NIM Badge --}}
                <div style="background-color: #374151; padding: 8px 16px; border-radius: 8px; font-family: monospace; letter-spacing: 0.5px; border: 1px solid #4b5563;">
                    NIM: {{ $nim ?? 'G.211.23.0019' }}
                </div>

            </div>
        </div>

    </div>

    <div style="text-align: center;">
        <a href="{{ url('/') }}" 
            style="display: inline-block; background-color: #000000; color: #ffffff; padding: 12px 30px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 14px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
            Kembali ke Beranda.
        </a>
    </div>

</div>
@endsection