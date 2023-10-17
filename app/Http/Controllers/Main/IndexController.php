<?php

namespace App\Http\Controllers\Main;

use App\Models\Author;
use App\Models\Book;

class IndexController
{
    public function index(){
        $books = Book::with('author')->get();
        $authors = Author::withCount('books')->orderBy('books_count', 'DESC')->get();
        return view('main.index', compact('books', 'authors'));
    }

}
