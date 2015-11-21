<?php

namespace Laradmin\Actions;

use Laradmin\Actions\ActionInterface;
use Laradmin\Actions\Action;

/**
 * Class DestroyAction
 * @package Laradmin\Actions
 */
class DestroyAction extends Action implements ActionInterface
{
    public function render($row)
    {
        $model = $this->getModel();
        $route = route(implode('.', [strtolower($model), 'destroy']),
            ['id' => $row->id]);

        return view('laradmin::actions/destroy_action', compact('route'));
    }
}
