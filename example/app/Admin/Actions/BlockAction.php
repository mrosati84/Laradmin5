<?php

namespace Laravel\Admin\Actions;

use Laradmin\Actions\ActionInterface;
use Laradmin\Actions\Action;

class BlockAction extends Action implements ActionInterface
{
    public function render($row)
    {
        return view('actions/block_action');
    }
}
