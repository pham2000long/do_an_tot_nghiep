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
        // foreach (glob(app_path('Services/*ServiceInterface.php')) as $service) {
        //     $serviceName = explode('Interface.php', basename($service))[0];
        //     $this->app->singleton(
        //         sprintf('App\\Services\\%sInterface', $serviceName),
        //         sprintf('App\\Services\\%s', $serviceName)
        //     );
        // }

        // foreach (glob(app_path('Repositories/*Contract.php')) as $repository) {
        //     $serviceName = explode('Contract.php', basename($repository))[0];
        //     $this->app->singleton(
        //         sprintf('App\\Repositories\\%sContract', $serviceName),
        //         sprintf('App\\Repositories\\%sRepository', $serviceName)
        //     );
        // }
        $this->app->singleton(
            \App\Repositories\BaseContract::class,
            \App\Repositories\BaseRepository::class
        );

        $this->app->singleton(
            \App\Repositories\SlideContract::class,
            \App\Repositories\SlideRepostitory::class
        );

        $this->app->singleton(
            \App\Repositories\ProductTypeContract::class,
            \App\Repositories\ProductTypeRepository::class
        );

        $this->app->singleton(
            \App\Repositories\CategoryContract::class,
            \App\Repositories\CategoryRepository::class
        );

        $this->app->singleton(
            \App\Repositories\SupplierContract::class,
            \App\Repositories\SupplierRepository::class
        );

        $this->app->singleton(
            \App\Repositories\ProductContract::class,
            \App\Repositories\ProductRepository::class
        );
    }
}
