<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;


class PlayerController extends Controller
{
    public function show($id)
    {
        $player = Player::with('team')->findOrFail($id);


        return view('players.show', compact('player'));
    }
}
