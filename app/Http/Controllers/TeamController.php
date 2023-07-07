<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();

        return view('teams.index', compact('teams'));
    }

    // public function show(Team $team)
    public function show($id)
    {
        // $players = $team->players;

        $team = Team::with('players', 'comments.user')->findOrFail($id);
        // return view('teams.show', compact('team', 'players'));
        return view('teams.show', compact('team'));
    }
}
