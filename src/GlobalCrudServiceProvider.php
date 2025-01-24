<?php

namespace pawanyd\GlobalCrud;

use Illuminate\Support\ServiceProvider;
use pawanyd\GlobalCrud\Console\InstallGlobalCrudCommand;

class GlobalCrudServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     */
    public function boot()
    {
        // 1. Publish Stubs (Controller + Blades)
        $this->publishes([
            __DIR__.'/stubs/GlobalController.stub' => base_path('app/Http/Controllers/GlobalController.php'),
            __DIR__.'/stubs/index.stub' => resource_path('views/global-crud/index.blade.php'),
            __DIR__.'/stubs/create.stub' => resource_path('views/global-crud/create.blade.php'),
            __DIR__.'/stubs/edit.stub' => resource_path('views/global-crud/edit.blade.php'),
        ], 'global-crud-stubs');

        // 2. Register Commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallGlobalCrudCommand::class,
            ]);
        }
    }

    /**
     * Register any package services.
     */
    public function register()
    {
        // If you need to bind any classes or singletons, do it here
    }
}
