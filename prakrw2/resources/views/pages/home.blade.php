@extends('layouts.app')

@section('content')
<div style="max-width: 1000px; margin: 40px auto; padding: 0 20px; font-family: sans-serif;">

    {{-- LOGIKA 1: TAMPILAN KHUSUS MEMBER (SUDAH LOGIN) --}}
    @auth
        {{-- HEADER SAMBUTAN --}}
        <div style="margin-bottom: 40px; text-align: left;">
            <h1 style="font-size: 32px; font-weight: 900; color: #111827; margin: 0 0 10px 0;">
                Halo, {{ Auth::user()->name }}! 👋
            </h1>
            <p style="color: #6b7280; font-size: 18px; margin: 0; line-height: 1.6;">
                Selamat datang di panel kontrol praktikum.
            </p>
        </div>

        {{-- GRID KARTU (RESPONSIF) --}}
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 25px;">

            {{-- KARTU 1: STATUS ROLE --}}
            <div style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 16px; padding: 30px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);">
                <div style="width: 50px; height: 50px; background-color: #f3f4f6; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 24px; margin-bottom: 20px;">
                    👤
                </div>
                <h2 style="font-size: 20px; font-weight: 800; color: #111827; margin: 0 0 10px 0;">Status Akun</h2>
                
                <div style="margin-top: 15px;">
                    @if (Auth::user()->is_admin)
                        <span style="display: inline-block; background-color: #fee2e2; color: #b91c1c; padding: 6px 14px; border-radius: 999px; font-size: 12px; font-weight: 800; border: 1px solid #fecaca;">
                            ADMIN (SUPERUSER)
                        </span>
                    @else
                        <span style="display: inline-block; background-color: #dbeafe; color: #1d4ed8; padding: 6px 14px; border-radius: 999px; font-size: 12px; font-weight: 800; border: 1px solid #bfdbfe;">
                            USER BIASA
                        </span>
                    @endif
                </div>
                <p style="font-size: 13px; color: #6b7280; margin-top: 15px; line-height: 1.5;">
                    *Admin dapat mengedit semua data, User hanya data miliknya sendiri.
                </p>
            </div>

            {{-- KARTU 2: BLOG POST --}}
            <div style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 16px; padding: 30px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div style="width: 50px; height: 50px; background-color: #fff7ed; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 24px; margin-bottom: 20px;">
                        📝
                    </div>
                    <h2 style="font-size: 20px; font-weight: 800; color: #111827; margin: 0 0 10px 0;">Blog Post</h2>
                    <p style="color: #6b7280; font-size: 14px; margin-bottom: 20px;">Kelola artikel dan postingan blog anda di sini.</p>
                </div>
                <a href="{{ route('posts.index') }}" 
                    style="display: block; text-align: center; background-color: #111827; color: #ffffff; padding: 12px 0; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 14px;">
                    Kelola Post
                </a>
            </div>

            {{-- KARTU 3: MAHASISWA --}}
            <div style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 16px; padding: 30px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div style="width: 50px; height: 50px; background-color: #ecfdf5; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 24px; margin-bottom: 20px;">
                        🎓
                    </div>
                    <h2 style="font-size: 20px; font-weight: 800; color: #111827; margin: 0 0 10px 0;">Data Mahasiswa</h2>
                    <p style="color: #6b7280; font-size: 14px; margin-bottom: 20px;">CRUD data akademik mahasiswa & fakultas.</p>
                </div>
                <a href="{{ route('mahasiswas.index') }}" 
                    style="display: block; text-align: center; background-color: #ffffff; color: #059669; border: 1px solid #059669; padding: 12px 0; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 14px;">
                    Lihat Mahasiswa
                </a>
            </div>

        </div>

    {{-- LOGIKA 2: TAMPILAN UNTUK TAMU (BELUM LOGIN) --}}
    @else
        <div style="text-align: center; padding: 100px 20px;">
            <h1 style="font-size: 40px; font-weight: 900; color: #111827; margin-bottom: 20px;">
                Praktikum Rekayasa web
            </h1>
            <p style="font-size: 18px; color: #6b7280; margin-bottom: 40px; max-width: 600px; margin-left: auto; margin-right: auto;">
                Anda belum login. Silakan masuk terlebih dahulu untuk mengakses Dashboard, Data Mahasiswa, dan Posting Blog.
            </p>
            
            <div style="display: flex; gap: 15px; justify-content: center;">
                <a href="{{ route('login') }}" style="background-color: #2563eb; color: white; padding: 14px 35px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 16px; transition: 0.3s;">
                    Login Sekarang
                </a>
            </div>
        </div>
    @endauth

</div>
@endsection