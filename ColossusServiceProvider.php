<?php namespace Edreamz\Ecommcore;

use Illuminate\Support\ServiceProvider;
use Illuminate\Console\Scheduling\Schedule;

class ColossusServiceProvider extends ServiceProvider {

    protected $defer = false;

    protected $commands = [

    ];

    public function boot()
    {
        $app = $this->app;
    }


    public function register()
    {
        $this->commands($this->commands);
    }

}