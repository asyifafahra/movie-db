<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    // Kolom yang bisa diisi mass assignment
    protected $fillable = [
        'category_name',
        'description',
    ];

    // Relasi: satu kategori bisa punya banyak movie
    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}
