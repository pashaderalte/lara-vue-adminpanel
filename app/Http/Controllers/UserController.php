<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('Users/Index', [
            'title' => 'Users',
            'users' => User::orderByDesc('created_at')->paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Users/Create', [
            'title' => 'Users Create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */

    // !!! Reimplement in Form Request
    public function store(Request $request)
    {
        User::create(
            $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required '],
        ])
        );

        session()->flash('message', 'New user created successfully!');

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Inertia\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Inertia\Response
     */
    public function edit(User $user)
    {
        return Inertia::render('Users/Edit', [
            'title' => 'Edit User Info',
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Inertia\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update(
            $request->validate([
                'name' => ['required'],
                'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            ])
        );

        session()->flash('message', 'User\'s info updated successfully!');

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Inertia\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        session()->flash('message', 'User deleted successfully!');

        return redirect()->back();
    }
}
