<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return view('welcome', compact('books'));
    }

    public function create()
    {
        return view('books-form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'writer' => ['required', 'string', 'max:255'],
            'published_year' => ['required', 'integer', 'min:1901', 'max:2155'],
            'cover_path' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('cover_path')) {
            $validated['cover_path'] = $request->file('cover_path')->store('covers', 'public');
        }

        Book::create($validated);

        return redirect('/');
    }

    // Route Model Binding: {book} di URL otomatis jadi object Book (404 kalau id tidak ada)
    public function edit(Book $book)
    {
        return view('books-form-edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'writer' => ['required', 'string', 'max:255'],
            'published_year' => ['required', 'integer', 'min:1901', 'max:2155'],
            'cover_path' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('cover_path')) {
            // Ganti cover: hapus file lama, simpan yang baru
            if ($book->cover_path) {
                Storage::disk('public')->delete($book->cover_path);
            }
            $validated['cover_path'] = $request->file('cover_path')->store('covers', 'public');
        } else {
            // Tidak upload cover baru: cover lama tetap dipakai
            unset($validated['cover_path']);
        }

        $book->update($validated);

        return redirect('/');
    }

    public function destroy(Book $book)
    {
        if ($book->cover_path) {
            Storage::disk('public')->delete($book->cover_path);
        }

        $book->delete();

        return redirect('/');
    }
}
