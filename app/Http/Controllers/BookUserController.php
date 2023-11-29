<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\BookUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BookUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, User $user)
    {
        // dd($user);
        foreach (json_decode($request->cartItems) as $book) {

            $bookUser = BookUser::create([
                'user_id' => $user->id,
                'book_id' => $book->id
            ]);
        }

        return Redirect::route('users.edit', ['user' => $user])->with([
            'success' => 'Books added to user',
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
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, Book $book)
    {
        $bookUser = BookUser::where('user_id', $user->id)->where('book_id', $book->id)->first();
        $bookUser->delete();
        return Redirect::route('users.show', ['user' => $user])->with([
            'success' => 'Successfully deleted book from user\'s library.',
        ]);
    }
}
