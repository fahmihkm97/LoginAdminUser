@extends('layouts.app')

@section('content')
<div style="max-width: 600px; margin: 40px auto; padding: 0 20px; font-family: sans-serif;">

    <div style="text-align: center; margin-bottom: 30px;">
        <h1 style="font-size: 24px; font-weight: 800; color: #111827; margin: 0;">Tambah Mahasiswa</h1>
        <p style="color: #6b7280; margin-top: 5px;">Masukkan data lengkap mahasiswa baru.</p>
    </div>

    <div style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 12px; padding: 30px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);">
        
        <form action="{{ route('mahasiswas.store') }}" method="POST">
            @csrf

            {{-- Input Nama --}}
            <div style="margin-bottom: 20px;">
                <label for="nama" style="display: block; font-weight: 600; margin-bottom: 8px; color: #374151; font-size: 14px;">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" required
                        style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 16px; box-sizing: border-box;"
                        placeholder="">
            </div>

            {{-- Input NIM --}}
            <div style="margin-bottom: 20px;">
                <label for="nim" style="display: block; font-weight: 600; margin-bottom: 8px; color: #374151; font-size: 14px;">NIM (Nomor Induk Mahasiswa)</label>
                <input type="text" id="nim" name="nim" required
                        style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 16px; box-sizing: border-box;"
                        placeholder="">
            </div>

            {{-- Input Fakultas --}}
            <div style="margin-bottom: 30px;">
                <label for="fakultas" style="display: block; font-weight: 600; margin-bottom: 8px; color: #374151; font-size: 14px;">Fakultas</label>
                <input type="text" id="fakultas" name="fakultas" required
                        style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 16px; box-sizing: border-box;"
                        placeholder="">
            </div>

            {{-- Tombol Aksi --}}
            <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #f3f4f6; padding-top: 20px;">
                <a href="{{ route('mahasiswas.index') }}" 
                    style="color: #4b5563; text-decoration: none; font-weight: 500; font-size: 14px;">
                    Batal
                </a>

                <button type="submit" 
                        style="background-color: #000000; color: #ffffff; padding: 12px 30px; border-radius: 8px; border: none; font-weight: bold; cursor: pointer; font-size: 14px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    Simpan Data
                </button>
            </div>
        </form>

    </div>
</div>
@endsection