<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function home(){

        $books = Book::all();

        return view('home', ['books' => $books]);
    }

    public function library()
    {
        $books = Book::all();

        return view('library', ['books' => $books]);
    }
}
