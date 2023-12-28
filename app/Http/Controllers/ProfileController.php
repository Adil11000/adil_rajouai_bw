<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{


/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

public function show()
{
    $user = auth()->user();
        return view('profile.show', compact('user'));
}

public function edit()
{
    $user = auth()->user();
    return view('profile.edit', compact('user'));
}

public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:8|confirmed',
        'birthday' => 'nullable|date',
        'biography' => 'nullable|string',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'birthday' => $request->birthday,
        'biography' => $request->biography,
    ];

    // Update het wachtwoord alleen als het is ingevuld
    if ($request->filled('password')) {
        $data['password'] = bcrypt($request->password);
    }

    // Update de gebruikersgegevens
    $user->update($data);

    // Verwerk de avatar-indiening (als er een is)
    if ($request->hasFile('avatar')) {
        $avatarPath = $request->file('avatar')->store('avatars', 'public');
        $user->avatar = $avatarPath;
        $user->save();
    }

    return redirect()->route('profile.show')->with('success', 'Profile updated successfully');
}
}

