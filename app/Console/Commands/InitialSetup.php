<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InitialSetup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'initial {scope?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Running initial setup after pulling this code';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $scope = $this->argument('scope');
        $newdb = $this->choice('New fresh database?', ['yes','no'], 1);
        switch ($scope) {
            case 'dev':
                $this->info('Running Instalation Development Environment');
                $this->runDevCommand($newdb);
                break;
            case 'server':
                $this->info('Running Instalation Server Environment');
                $this->runServerCommand($newdb);
                break;
            default:
                $this->error('invalid argument, only supported "dev" and "server" argument');
                break;
        }
    }

    private function runDevCommand($newdb) {
        $commands = [
            'composer install --ansi',
            'npm install --color=always',
            'php artisan key:generate --ansi',
        ];
        
        foreach ($commands as $command) {
            passthru($command);
        }
        
        if ($newdb == "yes") {
          passthru('php artisan migrate --ansi');
          passthru('php artisan db:seed --ansi');
        }
    }
    private function runServerCommand($newdb) {
        $commands = [
            'composer install --no-dev --optimize-autoload --ansi',
            'npm install --production --color=always',
            'npm run build --color=always',
            'php artisan key:generate --ansi',
            'php artisan migrate --force --ansi',
            'php artisan db:seed --ansi',
            'php artisan route:cache --ansi',
            'php artisan config:cache --ansi',
            'php artisan view:cache --ansi',
        ];

        foreach ($commands as $command) {
            passthru($command);
        }
    }
}
