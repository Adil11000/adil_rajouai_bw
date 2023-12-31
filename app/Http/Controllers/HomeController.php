<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;


class HomeController extends Controller
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
    
        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */
        public function index()
        {
            $user = auth()->user();
    
            // Controleer of de gebruiker een admin is
            if ($user->is_admin) {
                $users = User::all(); // Haal alle gebruikers op
                return view('admin.users.index', compact('users'));
            }
    
            return view('home');
        }
    
        /**
         * Promote a user to admin.
         *
         * @param  int  $userId
         * @return \Illuminate\Http\Response
         */
        public function promote($userId)
        {
            $userToPromote = User::findOrFail($userId);
    
            // Voer de logica uit om een gebruiker te bevorderen tot admin
            $userToPromote->update(['is_admin' => 1]);
    
            return redirect()->route('admin.users.index', compact('users'))->with('success', 'User successfully promoted to admin.');
        }
    }