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
            'avatar' => $request->input('avatar'),
        ]);

        // Update avatar als er een is geüpload
    if ($request->hasFile('avatar')) {
        // Verwijder oude avatar indien aanwezig
        

        $newAvatarPath = $request->file('avatar')->store('public/images');
        $user->update(['avatar' => str_replace('public/images', '', $newAvatarPath)]);
    }
        return redirect()->route('profile.edit', $user->id)->with('success', 'Profile updated successfully.');
    }
    public function show()
{
    $user = auth()->user();
    $user->avatar = asset('storage/images' . $user->avatar); // Volledige URL van de avatar

        return view('profile.show', compact('user'));
}

}
