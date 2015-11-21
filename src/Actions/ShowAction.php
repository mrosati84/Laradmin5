<?php

namespace Laradmin\Actions;

use Laradmin\Actions\ActionInterface;
use Laradmin\Actions\Action;

/**
 * Class ShowAction
 * @package Laradmin\Actions
 */
class ShowAction extends Action implements ActionInterface
{
    public function render($row)
    {
        $model = $this->getModel();
        $route = route(implode('.', [strtolower($model), 'show']),
            ['id' => $row->id]);

        return view('laradmin::actions/view_action', compact('route'));
    }
}
