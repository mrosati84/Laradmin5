<?php

namespace Laradmin\Actions;

use Laradmin\Actions\ActionInterface;

/**
 * Class Action
 * @package Laradmin\Actions
 */
class Action implements ActionInterface
{
    /**
     * @var string
     */
    private $model;

    /**
     * Action constructor.
     * @param $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * The render method by default does not render anything.
     * This class must always be extended and this method overridden.
     *
     * @param $row
     * @return null
     */
    public function render($row)
    {
        return NULL;
    }
}