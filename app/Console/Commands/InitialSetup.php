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

        switch ($scope) {
            case 'dev':
                $this->info('Running Instalation Development Environment');
                $this->runDevCommand();
                break;
            case 'server':
                $this->info('Running Instalation Server Environment');
                $this->runServerCommand();
                break;
            default:
                $this->error('invalid argument, only supported "dev" and "server" argument');
                break;
        }
    }

    private function runDevCommand() {
        $commands = [
            'composer install --ansi',
            'npm install --color=always',
            'php artisan migrate --ansi',
            'php artisan db:seed --ansi',
        ];

        foreach ($commands as $command) {
            passthru($command);
        }
    }
    private function runServerCommand() {
        $commands = [
            'composer install --no-dev --optimize-autoload --ansi',
            'npm install --production --color=always',
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
