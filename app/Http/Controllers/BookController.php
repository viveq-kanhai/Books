<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $books = Book::all();
        $books = Book::when(request('q'), function($query){
            $query->where('title', 'like', '%'.request('q').'%')
            ->orWhere('author', 'like', '%' . request('q') . '%');
        })->orderBy('created_at', 'desc')
        ->paginate(10);
        $subjects = Subject::all();
        return view('models.books.index', ['books' => $books, 'subjects' => $subjects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'subject' => 'required|int',
            'filePath' => 'string',
            'price' => 'required|numeric',
        ]);

        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'subject_id' => $request->subject,
            'file_path' => $request->filePath,
            'price' => $request->price,
        ]);

        return Redirect::route('books.index')->with([
            'success' => 'New book (' . $book->title . ') saved successfully.',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
