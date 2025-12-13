<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    /**
     * Logika Khusus: Method ini dijalankan SEBELUM method lain.
     * Jika user adalah admin, langsung izinkan semuanya (return true).
     */
    public function before(User $user, $ability)
    {
        if ($user->usertype === 'admin') {
            return true;
        }
    }

    /**
     * Cek apakah user boleh update post
     */
    public function update(User $user, Post $post)
    {
        // Karena Admin sudah lolos di function 'before' di atas,
        // di sini kita tinggal cek kepemilikan untuk user biasa.
        return $user->id === $post->user_id;
    }

    /**
     * Cek apakah user boleh hapus post
     */
    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }
}