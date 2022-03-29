<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ServiceBindServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        foreach (glob(app_path('Services/*ServiceInterface.php')) as $service) {
            $serviceName = explode('Interface.php', basename($service))[0];
            $this->app->singleton(
                sprintf('App\\Services\\%sInterface', $serviceName),
                sprintf('App\\Services\\%s', $serviceName)
            );
        }

        foreach (glob(app_path('Repositories/*Contract.php')) as $repository) {
            $serviceName = explode('Contract.php', basename($repository))[0];
            $this->app->singleton(
                sprintf('App\\Repositories\\%sContract', $serviceName),
                sprintf('App\\Repositories\\%sRepository', $serviceName)
            );
        }
    }
}
