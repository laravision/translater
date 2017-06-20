<?php

namespace Laravision\Translater; 

use Illuminate\Support\ServiceProvider;
use \Illuminate\Routing\Router;

class TranslaterServiceProvider extends ServiceProvider
{  
    public function boot(Router $route) { 
        /* include helper */
        require __DIR__ . '/Http/helper.php';
        /* include routes */
        require __DIR__ . '/Http/routes.php';


        /* load translation library */
        $this->loadTranslationsFrom(__DIR__.'/lang', 'Translater');

        /* get config file */
        $this->mergeConfigFrom(__DIR__ . '/config/laravision.php', 'laravision');
        /* load views */
        $this->loadViewsFrom(__DIR__ . '/views', 'Translater');

        /* load middleware */
        $route->middleware('translater', 'Laravision\Translater\Http\Middleware\TranslaterMiddleware');

    } 

    public function register(){

        /* publishe migrations files */
        /*$this->publishes([__DIR__ . '/database/migrations/' => base_path('database/migrations')]);*/

        $this->publishes([__DIR__ . '/config/' => base_path('config/')]);

    }
}
