<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TenantMigrate extends Command
{
    protected $signature = 'tenant:migrate';
    protected $description = 'Roda as migrations da pasta tenant';

    public function handle()
    {
        $this->call('migrate', [
            '--path' => 'database/migrations/tenant',
        ]);
    }
}
