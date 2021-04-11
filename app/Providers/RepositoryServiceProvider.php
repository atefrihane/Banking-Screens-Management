<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $models = [
            'User',
            'Network',
            'Channel',
            'Page',
            'Player',
            'Role',
            'Image',
            'Media',
            'Email',
            'Planning'

        ];
        foreach ($models as $model) {
            $this->app->bind(
                "App\Contracts\\{$model}RepositoryInterface",
                "App\Repositories\\{$model}Repository"
            );
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
