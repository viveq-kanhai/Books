<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
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
        $user = Auth::user();

        $books = $user->books;

        $books = Book::when(request('q'), function ($query) {
            $query->where('title', 'like', '%' . request('q') . '%')
            ->orwhere('author', 'like', '%' . request('q') . '%');
        })->get();

        return view('library', ['books' => $books]);
    }

    public function allBooks()
    {
        $books = Book::when(request('q'), function ($query) {
            $query->where('title', 'like', '%' . request('q') . '%')
            ->orwhere('author', 'like', '%' . request('q') . '%');
        })->get();
        return view('allBooks', ['books' => $books]);
    }
}
