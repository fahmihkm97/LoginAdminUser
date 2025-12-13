<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menambahkan kolom 'is_admin' ke tabel 'users'.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Menambahkan kolom boolean 'is_admin' dengan nilai default FALSE setelah kolom 'password'
            $table->boolean('is_admin')->default(false)->after('password');
        });
    }

    /**
     * Menghapus kolom 'is_admin' saat rollback.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // PERBAIKAN: Cek apakah kolom ada sebelum menghapusnya
            if (Schema::hasColumn('users', 'is_admin')) {
                $table->dropColumn('is_admin');
            }
        });
    }
};