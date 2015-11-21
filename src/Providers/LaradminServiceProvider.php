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

        if (!$config)
        {
            throw new ConfigurationException('Laradmin configuration file not found');
        }

        // Register routes.
        (new Routing($app, $appRouter))->registerRoutes();
    }

    /**
     * Boot service provider.
     */
    public function boot()
    {
        // Register package views
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'laradmin');
    }
}
