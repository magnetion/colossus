<?php

namespace Magnetion\Colossus\Console\Commands;

use Illuminate\Console\Command;
use Magnetion\Colossus\DynamicDB;

class ImportWordPress extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Colossus:ImportWordPress';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Started');

        $dbHost = $this->ask('Database Hostname?');
        $dbUsername = $this->ask('Database Username?');
        $dbPassword = $this->ask('Database Password?');
        $dbDatabase = $this->ask('Database?');

        $dbInfo = [
            'driver' => 'mysql',
            'host' => $dbHost,
            'port' => '3306',
            'database' => $dbDatabase,
            'username' => $dbUsername,
            'password' => $dbPassword
        ];

        $otf = new DynamicDB($dbInfo);
        $wp_posts = $otf->getTable('wp_posts');
        dd($wp_posts->get());
    }
}
