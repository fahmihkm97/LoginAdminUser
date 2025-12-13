<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate; // <--- Pastikan ini ada
use Illuminate\Routing\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->get(); 
        return view('posts.index', compact('posts'))->with('title', 'Daftar Blog Post');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        Auth::user()->posts()->create($validated); 

        return redirect()->route('posts.index')->with('status', 'Post berhasil dibuat!');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'))->with('title', $post->title);
    }

    // --- MEMBERSIHKAN LOGIKA DI SINI ---
    public function edit(Post $post)
    {
        // Cukup satu baris ini saja! Logika rumitnya sudah diurus oleh Policy.
        Gate::authorize('update', $post); 
        
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        // Cukup satu baris ini saja!
        Gate::authorize('update', $post); 

        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $post->update($validated);

        return redirect()->route('posts.index')->with('status', 'Post berhasil diperbarui!');
    }

    public function destroy(Post $post)
    {
        // Cukup satu baris ini saja!
        Gate::authorize('delete', $post); 

        $post->delete();

        return redirect()->route('posts.index')->with('status', 'Post berhasil dihapus!');
    }
}