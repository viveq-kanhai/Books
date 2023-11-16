<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home(){

        $books = Book::all();

        return view('home', ['books' => $books]);
    }
}
