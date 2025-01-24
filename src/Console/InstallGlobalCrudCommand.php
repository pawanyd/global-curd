<?php

namespace pawanyd\GlobalCrud\Console;

use Illuminate\Console\Command;

class InstallGlobalCrudCommand extends Command
{
    protected $signature = 'global-crud:install';
    protected $description = 'Install the Global CRUD Controller and blade views';

    public function handle()
    {
        $this->info('Publishing Global CRUD stubs...');

        // Call the vendor:publish command that uses our tag
        $this->call('vendor:publish', [
            '--tag' => 'global-crud-stubs',
            '--force' => true // Overwrite any existing files if you want
        ]);

        $this->info('Global CRUD stubs published successfully.');
    }
}
