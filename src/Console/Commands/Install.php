<?php

namespace Magnetion\Colossus\Console\Commands;

use Hash;
use Illuminate\Console\Command;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Colossus:Install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installs Colossus';

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
        $newUser = new \Magnetion\Colossus\Models\Author();
        $newUser->first_name = 'Colossus';
        $newUser->last_name = 'Admin';
        $newUser->email = 'admin@admin.com';
        $newUser->display_name = 'Admin';
        $newUser->status = 1;
        $newUser->hash = Hash::make('password');
        $newUser->save();

        $this->info('Install Complete');
    }
}
