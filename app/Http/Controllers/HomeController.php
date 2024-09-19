<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('home', compact('categories'));
    }

    public function books()
    {
        $categories = Category::all();
        $books = Book::all();
        return view('books', compact('books', 'categories'));
    }

    public function categories()
    {
        $categories = Category::all();
        return view('categories', compact('categories'));
    }

    public function categoryBooks(Request $request, $id)
    {
        $categories = Category::all();
        $category = Category::findOrFail($id);

        $sort = $request->query('sort');

        if ($sort === 'high') {
            $books = Book::where('category_id', $id)
                ->orderBy('price', 'desc')
                ->take(8)
                ->get();
        } elseif ($sort === 'low') {
            $books = Book::where('category_id', $id)
                ->orderBy('price', 'asc')
                ->take(8)
                ->get();
        } else {
            $books = Book::where('category_id', $id)->get();
        }

        return view('category_books', compact('category', 'books', 'categories'));
    }
}
