<?php

namespace Magnetion\Colossus;

use Illuminate\Support\ServiceProvider;
use Illuminate\Console\Scheduling\Schedule;

class ColossusServiceProvider extends ServiceProvider {

    protected $defer = false;

    protected $commands = [
        'Magnetion\Colossus\Console\Commands\ImportWordPress',
    ];

    public function boot()
    {
        $app = $this->app;
    }


    public function register()
    {
        $this->commands($this->commands);
        $this->loadMigrationsFrom(base_path('vendor/magnetion/colossus/src/Database/Migrations'));
    }

}