<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Mail\CommentReceived;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Comment;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(CommentRequest $request, $id)
    {
        $data = $request->validated();

        $team = Team::findOrFail($id);
        $comment = Comment::create(array_merge($data, [
            'user_id' => auth()->id(),
            'team_id' => $id
        ]));

        Mail::to($team->email)->send(new CommentReceived($team));

        return redirect()->back();
    }
}
