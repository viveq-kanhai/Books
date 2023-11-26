<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\accountType;
use App\Models\BookUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::with('accountTypes')->get();
        $users = User::when(request('q'), function ($query) {
            $query->where('firstName', 'like', '%' . request('q') . '%')
                ->orWhere('lastName', 'like', '%' . request('q') . '%');
        })->orderBy('created_at', 'desc')
        ->paginate(10);
        $accountTypes = accountType::orderBy('id', 'DESC')->get();

        return view('models.users.index', ['users' => $users, 'accountTypes' => $accountTypes]);
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
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email',
            'password' => 'required',
            'accountType' => 'required|int',
        ]);

        $user = User::create([
            'firstName' => $request->firstname,
            'lastName' => $request->lastname,
            'email' => $request->email,
            'password' => $request->password,
            'account_type_id' => $request->accountType,
        ]);

        return Redirect::route('users.index')->with([
            'success' => 'New user (' . $user->firstName . ' ' . $user->lastName . ') saved successfully.',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $books = $user->books()->with('subject')->when(request('q'), function ($query) {
            $query->where('title', 'like', '%' . request('q') . '%')
                ->orWhere('author', 'like', '%' . request('q') . '%');
        })
        ->orderBy('created_at', 'desc')
        ->paginate(100);
        // dd($books);

        // $bookUsers = BookUser::where('user_id', $user->id)->with('books')->get();
        // dd($bookUsers);

        return view('models.users.show', ['user' => $user, 'books'=> $books,
        // 'bookUsers' => $bookUsers
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // $books = Book::with('subject')->get();
        $books = Book::when(request('q'), function ($query) {
            $query->where('title', 'like', '%' . request('q') . '%')
                ->orWhere('author', 'like', '%' . request('q') . '%');
        })
        ->paginate(10);

        $userBookIds = $user->books->pluck('id')->toArray();
        $allBooks = Book::with('subject')->get();

        return view('models.users.edit', ['user' => $user, 'books' => $books, 'userBookIds' => $userBookIds, 'allBooks' => $allBooks]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'firstname' => 'required|string',
            'lastname'=> 'required|string',
            'email' => 'required|string'
        ]);

        $user->update([
            'firstName' => $request->firstname,
            'lastName' => $request->lastname,
            'email' => $request->email
        ]);

        return Redirect::route('users.edit', ['user'=> $user])->with([
            'success' => 'User (' . $user->firstName. ' ) updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return Redirect::route('users.index')->with([
            'success' => 'Successfully deleted user.',
        ]);
    }
}
