<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Label;
use View;

class ViewComposerServiceProvider extends ServiceProvider
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
    public function boot()
    {
        // Share labels with all views that need them
        View::composer([
            'partials.card_form_template',
            'partials.card_modal'
        ], function ($view) {
            $view->with('labels', Label::all());
        });
    }
}
