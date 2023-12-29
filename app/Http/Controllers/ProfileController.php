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

public function update(Request $request)
{
    $newAvatar=$request->name.'.'.$request->image->extension();
    $request->image->move(public_path('images/avatar'),$newAvatar);

    $user = auth()->user();
   $id=$user->id;
    $user= (new \App\Models\User)::where('id',$id)->update([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'birthday' => $request->input('birthday'),
        'about' => $request->input('about'),

    ]);
    return redirect()->route('profile.show')->with('status', 'Profile updated successfully');

}
}
