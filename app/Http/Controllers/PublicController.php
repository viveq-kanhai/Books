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

        $userId = auth()->id();

        $books = Book::whereHas('users', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
        ->when(request('q'), function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('author', 'like', '%' . $search . '%')
                ->orWhereHas('subject', function($query2){
                $query2->where('subject', 'like', '%' . request('q') . '%');
            });
            });
        })
        ->get();

        return view('library', ['books' => $books]);
    }

    public function allBooks()
    {
        $books = Book::when(request('q'), function ($query) {
            $query->where('title', 'like', '%' . request('q') . '%')
            ->orwhere('author', 'like', '%' . request('q') . '%')
            ->orWhereHas('subject', function($query2){
                $query2->where('subject', 'like', '%' . request('q') . '%');
            });
        })->get();
        return view('allBooks', ['books' => $books]);
    }
}
