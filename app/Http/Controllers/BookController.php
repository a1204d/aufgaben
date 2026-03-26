<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return Book::all();
    }

    public function show(int $id)
    {
        return Book::find($id);
    }

    public function findBySlug(string $slug)
    {
        return Book::where('slug', $slug)->first();
    }

    public function findByYear(int $year)
    {
        return Book::where('year', $year)->get();
    }

    public function findByMaxPages(int $pages)
    {
        return Book::where('pages', '<=', $pages)->get();
    }

    public function search(string $search)
    {
        return Book::where('title', 'like', '%' . $search . '%')
            ->orWhere('author', 'like', '%' . $search . '%')
            ->get();
    }

    public function count()
    {
        return response()->json(['count' => Book::count()]);
    }

    public function avgPages()
    {
        return response()->json(['avg-pages' => Book::avg('pages')]);
    }

    public function dashboard()
    {
        return response()->json([
            'books' => Book::count(),
            'pages' => Book::sum('pages'),
            'oldest' => Book::min('year'),
            'newest' => Book::max('year'),
        ]);
    }
}
