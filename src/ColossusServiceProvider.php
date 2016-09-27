<?php

namespace Magnetion\Colossus;

use Illuminate\Support\ServiceProvider;
use Illuminate\Console\Scheduling\Schedule;

class ColossusServiceProvider extends ServiceProvider {

    protected $defer = false;

    protected $commands = [
        'Magnetion\Colossus\Console\Commands\ImportWordPress',
        'Magnetion\Colossus\Console\Commands\Install',
    ];

    public function boot()
    {
        $app = $this->app;
        include __DIR__.'/Routes/routes.php';
        $this->loadViewsFrom(__DIR__.'/Views', 'Colossus');

        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Gravatar', 'Thomaswelton\LaravelGravatar\Facades\Gravatar');
        $loader->alias('Form', 'Collective\Html\FormFacade');
        $loader->alias('Html', 'Collective\Html\HtmlFacade');
    }


    public function register()
    {
        $this->commands($this->commands);
        $this->loadMigrationsFrom(base_path('vendor/magnetion/colossus/src/Database/Migrations'));

        $this->app->register('Thomaswelton\LaravelGravatar\LaravelGravatarServiceProvider');
        $this->app->register('Collective\Html\HtmlServiceProvider');
    }

}