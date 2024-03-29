<?php

namespace Laradmin;

use Illuminate\Routing\Router;
use Illuminate\Contracts\Foundation\Application;

use Laradmin\Laradmin;
use Laradmin\Data\LaradminModelManager;

/**
 * Class Routing
 * @package Laradmin
 */
class Routing
{
    /**
     * @var Application
     */
    private $app;

    /**
     * @var Router
     */
    private $router;

    /**
     * Routing constructor.
     * @param $router
     */
    public function __construct($app, $router)
    {
        $this->app = $app;
        $this->router = $router;
    }

    /**
     * Register all the routes for all the defined models.
     */
    public function registerRoutes()
    {
        foreach (Laradmin::getModels() as $model)
        {
            $model_lowercased_name = strtolower($model);
            $admin_classpath = implode('\\', [Laradmin::getAdminClassesNamespace(), $model]);

            // Register the admin controller class in the application container
            // in this way we can inject extra informations inside the admin
            // class, for example the model name.
            $this->app->bind($admin_classpath, function() use ($model, $admin_classpath) {
                $model_manager = new LaradminModelManager(Laradmin::getModelFullClassPath($model));
                return new $admin_classpath($model, $model_manager);
            });

            // Register a route resource for this model.
            $this->router->resource($model_lowercased_name, $admin_classpath);
        }
    }
}
