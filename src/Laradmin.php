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
     * throw an exception eventually.
     *
     * @param string $config_param
     * @return array|string
     * @throws ConfigurationException
     */
    private static function checkSafeConfig($config_param)
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
        return self::checkSafeConfig(self::LARADMIN_MODELS);
    }

    /**
     * Get the models namespace.
     *
     * @return array|string
     * @throws ConfigurationException
     */
    public static function getModelsNamespace()
    {
        return self::checkSafeConfig(self::LARADMIN_MODELS_NAMESPACE);
    }

    /**
     * Get admin classes namespace.
     *
     * @return string
     * @throws ConfigurationException
     */
    public static function getAdminClassesNamespace()
    {
        return self::checkSafeConfig(self::LARADMIN_ADMIN_CLASSES_NAMESPACE);
    }
}