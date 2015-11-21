<?php

namespace Laradmin\Actions;

use Laradmin\Actions\ActionInterface;
use Laradmin\Actions\Action;

/**
 * Class EditAction
 * @package Laradmin\Actions
 */
class EditAction extends Action implements ActionInterface
{
    public function render($row)
    {
        $model = $this->getModel();
        $route = route(implode('.', [strtolower($model), 'edit']),
            ['id' => $row->id]);

        return view('laradmin::actions/edit_action', compact('route'));
    }
}
