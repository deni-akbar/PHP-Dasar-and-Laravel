<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {
    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        // Bind Interface and Repository class together
        $this->app->bind(
            'App\Interfaces\PostInterface',
            'App\Repositories\PostRepository'
        );
        $this->app->bind(
            'App\Interfaces\CompanyInterface',
            'App\Repositories\CompanyRepository'
        );
        $this->app->bind(
            'App\Interfaces\EmployeeInterface',
            'App\Repositories\EmployeeRepository'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        //
    }
}