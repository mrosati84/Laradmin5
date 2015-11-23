<?php

namespace Laravel\Admin;

use Laradmin\Controllers\LaradminBaseController;
use Laradmin\Forms\TextInput;
use Laradmin\Widgets\TextWidget;
use Laradmin\Forms\BelongsToInput;
use Laradmin\Fields\LaradminField;

/**
 * Class Author
 * @package Laravel\Admin
 */
class Author extends LaradminBaseController
{
    // Override default admin class.
    public function getModelFields()
    {
        return [
            'name' => (new LaradminField('Full name'))
                ->setWidget(new TextWidget())
                ->setInput(new TextInput()),

            'books' => (new LaradminField('Books'))
                ->setWidget(new TextWidget())
                ->setInput(new TextInput()),
        ];
    }
}
