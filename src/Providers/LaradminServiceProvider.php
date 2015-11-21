<?php

namespace Laradmin\Providers;

use Illuminate\Support\ServiceProvider;

use Laradmin\Exceptions\ConfigurationException;
use Laradmin\Laradmin;
use Laradmin\Routing;

/**
 * Class LaradminServiceProvider
 * @package Laradmin\Providers
 */
class LaradminServiceProvider extends ServiceProvider
{
    /**
     * @throws ConfigurationException
     */
    public function register()
    {
        $app = $this->app; // The Laravel app container.
        $config = config(Laradmin::LARADMIN_CONFIG); // Get Laradmin configuration.
        $appRouter = $app[Laradmin::ILLUMINATE_ROUTING_ROUTER];

        if ($config)
        {
            // Register routes.
            (new Routing($app, $appRouter))->registerRoutes();
        }
    }

    /**
     * Boot service provider.
     */
    public function boot()
    {
        // Register package views directories.
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'laradmin');

        // Register config files and directories published by the package.
        $this->publishes([
            __DIR__ . '/../../config/laradmin.php' => config_path('laradmin.php'),
            __DIR__ . '/../../resources/views' => base_path('resources/views/vendor/laradmin'),
            __DIR__ . '/../../resources/assets' => public_path('vendor/laradmin'),
        ]);
    }
}
