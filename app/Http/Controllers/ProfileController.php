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



public function edit()
{
    $user = auth()->user();
    return view('profile.edit', compact('user')); 
}

public function update(Request $request)
{
    $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|max:255',
        'birthday' => 'date',
        'biography' => 'nullable|string',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image upload
    ]);

    $user = auth()->user();
    $id = $user->id;

    $userData = [
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'birthday' => $request->input('birthday'),
        'biography' => $request->input('biography'),
    ];

    // Check if an image is uploaded
    if ($request->hasFile('image')) {
        $newAvatar = $request->name . '.' . $request->image->extension();
        $request->image->move(public_path('images/avatar'), $newAvatar);

        // Add avatar to user data
        $userData['avatar'] = $newAvatar;
    }

    // Update user data
    $user->update($userData);

    return redirect()->route('profile.show')->with('status', 'Profile updated successfully');
}
public function show()
{
    $user = auth()->user();
        return view('profile.show', compact('user'));
}

}
