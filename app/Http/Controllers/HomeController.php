<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
        public function index()
    {
        $books = Book::with('bookType')
        ->latest()
        ->take(4)
        ->get();

        return view('home.index', compact('books'));
    }

    public function contact()
    {
        return view('contact-us.index');
    }

}

