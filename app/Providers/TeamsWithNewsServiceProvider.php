<?php

namespace App\Providers;

use App\Models\Team;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class TeamsWithNewsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services. 
     */
    public function boot(): void
    {
        $teamsWithNews = Team::whereHas('news')->get();

        View::share('teamsWithNews', $teamsWithNews);
    }
}
