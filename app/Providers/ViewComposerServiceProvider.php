<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Board;

class ViewComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Compartilha $boards com todas as views ou views específicas
        View::composer('layouts.partials.navigation', function ($view) {
            $boards = Board::all(); // Ou sua lógica para obter os boards
            $view->with('boards', $boards);
        });

        // Ou se quiser compartilhar com múltiplas views:
        View::composer(['layouts.partials.navigation', 'outras.views'], function ($view) {
            $boards = Board::all();
            $view->with('boards', $boards);
        });

        // Ou se quiser compartilhar com todas as views:
        View::share('boards', Board::all());
    }
}
