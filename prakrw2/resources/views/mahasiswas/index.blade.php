@extends('layouts.app')

@section('content')
<div style="max-width: 1000px; margin: 40px auto; padding: 0 20px; font-family: sans-serif;">

    {{-- Header Section --}}
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h1 style="font-size: 28px; font-weight: 800; color: #111827; margin: 0;">Daftar Mahasiswa</h1>
            <p style="color: #6b7280; margin: 5px 0 0 0;">Kelola data mahasiswa fakultas.</p>
        </div>
        <a href="{{ route('mahasiswas.create') }}" 
           style="background-color: #000000; color: #ffffff; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 14px; display: inline-block; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
           + Tambah Mahasiswa
        </a>
    </div>

    {{-- Flash Message --}}
    @if (session('status'))
        <div style="background-color: #d1fae5; border: 1px solid #34d399; color: #065f46; padding: 15px; border-radius: 8px; margin-bottom: 25px;">
            ✅ {{ session('status') }}
        </div>
    @endif

    {{-- Tabel Wrapper (Card) --}}
    <div style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);">
        <table style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
                <tr style="background-color: #f9fafb; border-bottom: 1px solid #e5e7eb;">
                    <th style="padding: 16px; font-size: 12px; font-weight: 700; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em;">No</th>
                    <th style="padding: 16px; font-size: 12px; font-weight: 700; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em;">Nama</th>
                    <th style="padding: 16px; font-size: 12px; font-weight: 700; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em;">NIM</th>
                    <th style="padding: 16px; font-size: 12px; font-weight: 700; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em;">Fakultas</th>
                    <th style="padding: 16px; font-size: 12px; font-weight: 700; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em; text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswas as $mahasiswa)
                <tr style="border-bottom: 1px solid #f3f4f6;">
                    <td style="padding: 16px; color: #6b7280; font-weight: 500;">{{ $loop->iteration }}</td>
                    <td style="padding: 16px; color: #111827; font-weight: 600;">{{ $mahasiswa->nama }}</td>
                    <td style="padding: 16px; color: #374151; font-family:  font-size: 14px;">{{ $mahasiswa->nim }}</td>
                    <td style="padding: 16px;">
                        <span style="background-color: #e0e7ff; color: #4338ca; padding: 7px 10px; border-radius: 999px; font-size: 17px; font-weight: 700;">
                            {{ $mahasiswa->fakultas }}
                        </span>
                    </td>
                    <td style="padding: 16px; text-align: right;">
                        <div style="display: inline-flex; gap: 10px; align-items: center; justify-content: flex-end;">
                            <a href="{{ route('mahasiswas.show', $mahasiswa) }}" style="color: #4b5563; text-decoration: none; font-size: 14px; font-weight: 600;">Detail</a>
                            
                            <a href="{{ route('mahasiswas.edit', $mahasiswa) }}" style="color: #d97706; text-decoration: none; font-size: 14px; font-weight: 600;">Edit</a>
                            
                            <form action="{{ route('mahasiswas.destroy', $mahasiswa) }}" method="POST" style="display: inline;">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin hapus {{ $mahasiswa->nama }}?')" 
                                        style="background: none; border: none; color: #dc2626; cursor: pointer; font-size: 14px; font-weight: 600; padding: 0;">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        @if($mahasiswas->isEmpty())
            <div style="padding: 40px; text-align: center; color: #6b7280;">
                Data mahasiswa belum tersedia.
            </div>
        @endif
    </div>
</div>
@endsection