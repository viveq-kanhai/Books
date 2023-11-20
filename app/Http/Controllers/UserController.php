<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\accountType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('accountTypes')->get();
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
            'success' => 'New user (' . $user->firstname . ' ' . $user->lastname . ') saved successfully.',
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
