<?php

namespace Laradmin\Data;

use Illuminate\Database\Eloquent\Collection;

/**
 * Class LaradminModelManager
 * @package Laradmin\Data
 */
class LaradminModelManager
{
    /**
     * @var string
     *   The full model class path, with namespace.
     */
    private $model;

    /**
     * LaradminModelManager constructor.
     *
     * @param string $model
     *   The full model class path, with namespace.
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Get the model.
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Return all the rows from an Eloquent model.
     *
     * @return Collection
     */
    public function all()
    {
        $model = $this->getModel();

        return $model::all();
    }
}