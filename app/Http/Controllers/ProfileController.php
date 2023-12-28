<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{


    // In ProfileController.php
public function __construct()
{
    $this->middleware('auth');
}


public function show()
{
    return view('profiles.show');
}

public function edit()
{
    return view('profiles.edit');
}



}
