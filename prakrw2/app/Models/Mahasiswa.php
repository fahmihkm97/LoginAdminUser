<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * Kolom yang boleh diisi melalui Mahasiswa::create($data).
     */
    protected $fillable = [
        'nama', 
        'nim', 
        'fakultas'
    ];
}