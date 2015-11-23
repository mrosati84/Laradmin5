<?php

namespace Laravel\Admin;

use Laradmin\Data\LaradminModelManager;

/**
 * Class UserModelManager
 * @package Laravel\Admin
 */
class UserModelManager extends LaradminModelManager
{
    // Override the all method, here we limit the results to 2.
    public function all()
    {
        return parent::all()->take(2);
    }
}
