<?php

namespace App\Providers;

use App;

use App\Models\Menu;
use App\Models\Options;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('front.layouts.app', function ($view) {
            $options = Options::query()->first();
            $menus = Menu::query()->where('parent_id','=',0)->get();
            //dd($messages);
            View::share('options', $options);
            View::share('menus', $menus);

        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
