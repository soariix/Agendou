<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:tenant-migrate')]
#[Description('Command description')]
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
