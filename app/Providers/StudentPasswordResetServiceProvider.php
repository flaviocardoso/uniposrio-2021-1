<?php

namespace App\Providers;

use App\Services\StudentPasswordBrokerManager;
use Illuminate\Support\ServiceProvider;

class StudentPasswordResetServiceProvider extends ServiceProvider
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
        $this->app->singleton('auth.password.student', function ($app) {
            return new StudentPasswordBrokerManager($app);
        });
    }

    public function provides()
    {
        return ['auth.password.student'];
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
