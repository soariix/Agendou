<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:tenant-make-migration')]
#[Description('Command description')]
class TenantMakeMigration extends Command
{
    protected $signature = 'tenant:make:migration {name}';
    protected $description = 'Cria uma migration na pasta tenant';

    public function handle()
    {
        $this->call('make:migration', [
            'name' => $this->argument('name'),
            '--path' => 'database/migrations/tenant',
        ]);
    }
}
