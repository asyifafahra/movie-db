<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    // Isi yang boleh diisi lewat mass assignment
    protected $fillable = [
        'title',
        'slug',
        'synopsis',
        'category_id',
        'year',
        'actors',
        'cover_image',
    ];

    // Relasi ke Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
