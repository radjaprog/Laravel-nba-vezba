<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewsRequest;
use App\Models\News;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{

    public function index(Request $request)
    {
        $teamName = $request->query('team');

        if (isset($teamName)) {
            return $this->getNewsByTeamName($teamName);
        }

        $news = News::orderBy("id", "desc")->simplePaginate(10);

        return view('news.index', compact('news'));
    }

    public function show($id)
    {
        $news = News::with('teams')->findOrFail($id);

        return view('news.show', compact('news'));
    }

    public function getNewsByTeamName($teamName)
    {
        $team = Team::where('name', $teamName)->firstOrFail();

        $news = $team->news()->simplePaginate(10);

        return view('news.index', compact('news'));
    }

    public function create()
    {
        $teams = Team::all();

        return view('news.create', ['teams' => $teams]);
    }

    public function store(CreateNewsRequest $request)
    {
        $validated = $request->validated();

        $news = News::create([
            'title' => request('title'),
            'content' => request('content'),
            'user_id' => auth()->id()
        ]);

        //        dd($request->all());

        $team_ids = request('team_ids');

        foreach ($team_ids as $team_id) {
            $news->teams()->attach($team_id);
        }

        session()->flash('message', 'Thank you for publishing article on www.nba.com');

        return redirect("/news/{$news->id}");
        // '/news/' . $news->id
    }
}
