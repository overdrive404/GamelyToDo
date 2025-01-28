<?php

namespace App\Http\Controllers\User\Main;

use App\Models\Character;

class HomeController
{
    public function index()
    {
        $character = auth()->user()->getCharacter;
        return view('main.home', compact('character'));
    }

}
