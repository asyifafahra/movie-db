<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(10);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi input
        $validated = $request->validate([
            'category_name' => 'required|string|max:128|unique:categories,category_name',
            'description' => 'required|string',
        ]);

        // simpan data
        Category::create($validated);

        // redirect dengan pesan sukses
        return redirect('/categories')->with('success', 'Category berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // validasi input
        $validated = $request->validate([
            'category_name' => 'required|string|max:128|unique:categories,category_name,' . $category->id,
            'description' => 'required|string',
        ]);

        // update data
        $category->update($validated);

        // redirect dengan pesan sukses
        return redirect('/categories')->with('success', 'Category berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('/categories')->with('success', 'Category berhasil dihapus.');
    }
}
