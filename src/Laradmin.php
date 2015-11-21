<?php

namespace Laradmin;

use Laradmin\Exceptions\ConfigurationException;

/**
 * Class Laradmin
 * @package Laradmin
 */
class Laradmin
{
    const LARADMIN_MODELS = 'laradmin.models';
    const LARADMIN_ADMIN_CLASSES_NAMESPACE = 'laradmin.admin_classes_namespace';
    const LARADMIN_MODELS_NAMESPACE = 'laradmin.models_namespace';
    const LARADMIN_CONFIG = 'laradmin';
    const ILLUMINATE_ROUTING_ROUTER = 'Illuminate\Routing\Router';

    /**
     * Safely checks if a configuration parameter exists and
     * get it. Throws an exception if parameter is not found.
     *
     * @param string $config_param
     * @return array|string
     * @throws ConfigurationException
     */
    private static function getSafeConfig($config_param)
    {
        $config_value = config($config_param);

        if (!$config_value)
        {
            throw new ConfigurationException($config_param . ' parameter is not set');
        }

        return $config_value;
    }

    /**
     * Get the Eloquent models handled by Laradmin.
     *
     * @return array
     * @throws ConfigurationException
     */
    public static function getModels()
    {
        return self::getSafeConfig(self::LARADMIN_MODELS);
    }

    /**
     * Get the models namespace.
     *
     * @return string
     * @throws ConfigurationException
     */
    public static function getModelsNamespace()
    {
        return self::getSafeConfig(self::LARADMIN_MODELS_NAMESPACE);
    }

    /**
     * Return the full class path (with namespace) for a model.
     *
     * @param string $model
     *   The model name, without the namespace.
     *
     * @return string
     *   The model, with namespace prepended.
     */
    public static function getModelFullClassPath($model)
    {
        return implode('\\', [self::getSafeConfig(self::LARADMIN_MODELS_NAMESPACE), $model]);
    }

    /**
     * Get admin classes namespace.
     *
     * @return string
     * @throws ConfigurationException
     */
    public static function getAdminClassesNamespace()
    {
        return self::getSafeConfig(self::LARADMIN_ADMIN_CLASSES_NAMESPACE);
    }
}