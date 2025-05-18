<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    // Tampilkan daftar movie
    public function index()
    {
        $movies = Movie::with('category')->paginate(10);
        return view('movie.index', compact('movies'));
    }

    // Tampilkan form tambah movie
    public function create()
    {
        $categories = Category::all();
        return view('movie.create', compact('categories'));
    }

    // Simpan movie baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'slug'        => 'required|string|max:255|unique:movies,slug',
            'category_id' => 'required|exists:categories,id',
            'year'        => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'actors'      => 'nullable|string',
            'synopsis'    => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload cover image jika ada
        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('cover_images', 'public');
            $validated['cover_image'] = $path;
        }

        Movie::create($validated);

        return redirect()->route('movies.index')->with('success', 'Film berhasil ditambahkan.');
    }

    // Tampilkan detail movie
    public function show(Movie $movie)
    {
        return view('movie.show', compact('movie'));
    }

    // Tampilkan form edit movie
    public function edit(Movie $movie)
    {
        $categories = Category::all();
        return view('movie.edit', compact('movie', 'categories'));
    }

    // Update data movie
    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'slug'        => 'required|string|max:255|unique:movies,slug,' . $movie->id,
            'category_id' => 'required|exists:categories,id',
            'year'        => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'actors'      => 'nullable|string',
            'synopsis'    => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('cover_image')) {
            // Hapus cover lama jika ada
            if ($movie->cover_image && Storage::disk('public')->exists($movie->cover_image)) {
                Storage::disk('public')->delete($movie->cover_image);
            }
            $path = $request->file('cover_image')->store('cover_images', 'public');
            $validated['cover_image'] = $path;
        }

        $movie->update($validated);

        return redirect()->route('movies.index')->with('success', 'Film berhasil diupdate.');
    }

    // Hapus movie
    public function destroy(Movie $movie)
    {
        // Hapus cover image juga jika ada
        if ($movie->cover_image && Storage::disk('public')->exists($movie->cover_image)) {
            Storage::disk('public')->delete($movie->cover_image);
        }
        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Film berhasil dihapus.');
    }
}
