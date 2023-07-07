<?php

namespace App\Http\Middleware;

use App\Http\Controllers\CommentController;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class ForbiddenComment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $forbiddenWords = ['idiot', 'hate', 'stupid'];

        return Str::contains($request->content, $forbiddenWords, true)
            ? response(view('comments.forbidden-comment'))
            : $next($request);

        // if (Str::contains($request->content, $forbiddenWords)) {
        // return response(view('teams.forbidden-comment.blade.php'));
        // }
        // return $next($request);
    }
}
