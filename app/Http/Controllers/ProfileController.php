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



    public function edit(User $user)
    {
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'birthday' => 'nullable|date',
            'about' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update gebruiker
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'birthday' => $request->input('birthday'),
            'biography' => $request->input('about'),
        ]);

        // Update avatar als er een is geüpload
        if ($request->hasFile('avatar')) {
            $newAvatar = $request->name . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('avatars'), $newAvatar);

            $user->update(['avatar' => $newAvatar]);
        }

        return redirect()->route('profile.edit', $user->id)->with('success', 'Profile updated successfully.');
    }
    public function show()
{
    $user = auth()->user();
        return view('profile.show', compact('user'));
}

}
