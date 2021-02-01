<?php

namespace App\Providers;

use App\Services\CollaboratorPasswordBrokerManager;
use Illuminate\Support\ServiceProvider;

class CollaboratorPasswordResetServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerPasswordBrokerManager();
    }

    protected function registerPasswordBrokerManager()
    {
        $this->app->singleton('auth.password.collaborator', function ($app) {
            return new CollaboratorPasswordBrokerManager($app);
        });
    }

    public function provides()
    {
        return ['auth.password.collaborator'];
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
