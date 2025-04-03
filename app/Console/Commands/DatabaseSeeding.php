<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DatabaseSeeding extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dbs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'cleaning database and seeding';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        passthru('php artisan migrate:fresh --seed --ansi');
    }
}
