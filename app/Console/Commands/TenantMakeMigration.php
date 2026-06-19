<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TenantMakeMigration extends Command
{
    protected $signature = 'tenant:make:migration {name}';
    protected $description = 'Cria uma migration na pasta tenant';

    public function handle()
    {
        $this->call('make:migration', [
            'name'   => $this->argument('name'),
            '--path' => 'database/migrations/tenant',
        ]);
    }
}
