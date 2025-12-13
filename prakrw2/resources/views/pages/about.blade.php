@extends('layouts.app')

@section('content')
<div style="max-width: 700px; margin: 60px auto; padding: 0 20px; font-family: sans-serif;">

    {{-- KARTU UTAMA --}}
    <div style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 16px; padding: 60px 40px; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05); text-align: center;">

        {{-- Label Kecil (Opsional, pemanis) --}}
        <div style="margin-bottom: 25px;">
            <span style="background-color: #f3f4f6; color: #4b5563; padding: 8px 16px; border-radius: 999px; font-size: 12px; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px;">
                Informasi
            </span>
        </div>

        {{-- Judul Besar --}}
        <h1 style="font-size: 40px; font-weight: 900; color: #111827; margin: 0 0 20px 0; letter-spacing: -1px;">
            Tentang Kami
        </h1>

        {{-- Garis Pemisah Kecil --}}
        <div style="width: 50px; height: 4px; background-color: #000000; margin: 0 auto 30px auto; border-radius: 2px;"></div>

        {{-- Isi Konten --}}
        <p style="font-size: 20px; color: #4b5563; line-height: 1.6; margin: 0 auto 50px auto; max-width: 500px;">
            Aplikasi ini dibuat untuk praktikum Laravel 12.
        </p>

        {{-- Tombol Kembali --}}
        <a href="{{ url('/') }}" 
            style="display: inline-block; background-color: #111827; color: #ffffff; padding: 14px 35px; border-radius: 10px; text-decoration: none; font-weight: bold; font-size: 15px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
            Kembali ke Beranda
        </a>

    </div>
</div>
@endsection