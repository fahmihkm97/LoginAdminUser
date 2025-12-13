@extends('layouts.app')

@section('content')
{{-- Container dibuat ramping (max-w-4xl) agar tidak terlalu lebar di layar besar --}}
<div class="max-w-4xl mx-auto py-12 px-4 sm:px-6">

    {{-- Header Section --}}
    <div class="flex items-center justify-between mb-10 border-b border-gray-200 pb-6">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Blog Posts</h1>
            <p class="mt-2 text-gray-500 text-sm">Update terbaru dari komunitas.</p>
        </div>

        @auth
            <a href="{{ route('posts.create') }}" 
               class="inline-flex items-center px-6 py-3 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-gray-900 hover:bg-gray-800 transition-all transform hover:-translate-y-0.5"
               style="background-color: #111827; color: white; text-decoration: none;">
                <span>+ Buat Baru</span>
            </a>
        @endauth
    </div>

    {{-- Post List --}}
    <div class="space-y-8">
        @forelse ($posts as $post)
            <article class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sm:p-8 hover:shadow-md transition-shadow duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center space-x-2 text-sm text-gray-500">
                        <span class="font-semibold text-indigo-600 bg-indigo-50 px-2 py-1 rounded">
                            {{ substr($post->user->name ?? 'Admin', 0, 1) }}
                        </span>
                        <span>{{ $post->user->name ?? 'Tidak diketahui' }}</span>
                        <span>&bull;</span>
                        <span>{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                </div>

                <h2 class="text-2xl font-bold text-gray-900 mb-3 hover:text-indigo-600 transition-colors">
                    <a href="{{ route('posts.show', $post) }}" style="text-decoration: none; color: inherit;">
                        {{ $post->title }}
                    </a>
                </h2>

                <p class="text-gray-600 leading-relaxed mb-6">
                    {{ Str::limit($post->content, 180) }}
                </p>

                <div class="flex items-center text-sm font-medium">
                    <a href="{{ route('posts.show', $post) }}" 
                       class="text-indigo-600 hover:text-indigo-800 transition-colors flex items-center gap-1"
                       style="color: #4f46e5; text-decoration: none;">
                        Baca Selengkapnya 
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
            </article>
        @empty
            <div class="text-center py-20 bg-gray-50 rounded-2xl border border-dashed border-gray-300">
                <p class="text-gray-500 text-lg">Belum ada postingan yang tersedia.</p>
            </div>
        @endforelse
    </div>

</div>
@endsection