<?php


// In app/Http/Controllers/ContactController.php

namespace App\Http\Controllers;
use App\Models\ContactMessage;


use Illuminate\Http\Request;

class ContactController extends Controller
{    
    public function showForm()
    {
        // Controleer of de huidige gebruiker een admin is
        $isAdmin = auth()->check() && auth()->user()->is_admin;

        // Haal alle berichten op als de gebruiker een admin is
        $messages = $isAdmin ? ContactMessage::all() : null;

        return view('contact', compact('messages', 'isAdmin'));
    }
    
    
    public function index()
    {
        return view('contact');
    }
    public function submitForm(Request $request)
{
    // Valideer het formulier
    $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required',
    ]);

    // Sla het bericht op in de database
    ContactMessage::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'message' => $request->input('message'),
    ]);

    // Redirect of toon een bedankpagina
    return redirect()->route('contact.form')->with('success', 'Bericht succesvol verzonden!');
}
}
