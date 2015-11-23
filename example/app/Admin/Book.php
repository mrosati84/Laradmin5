<?php

namespace Laravel\Admin;

use Laradmin\Controllers\LaradminBaseController;

use Laradmin\Forms\TextInput;
use Laradmin\Widgets\TextWidget;
use Laradmin\Widgets\DateWidget;
use Laradmin\Widgets\BelongsToWidget;
use Laradmin\Fields\LaradminField;
use Laradmin\Forms\BelongsToInput;

/**
 * Class Book
 * @package Laravel\Admin
 */
class Book extends LaradminBaseController
{
    // Override default admin class.
    public function getModelFields()
    {
        return [
            'title' => (new LaradminField('Title'))
                ->setWidget(new TextWidget())
                ->setInput(new TextInput()),

            'author' => (new LaradminField('Author'))
                // First parameter in constructor here indicates which
                // column we want to use inside the relationship
                // to print the actual relationship value.
                // The second parameter is the model which this
                // model belongs to. It is used to build the relationship
                // backwards (i.e. for building links).
                // Third parameter is the primary key of the parent model.
                ->setWidget(new BelongsToWidget('name', 'Author', 'id'))

                // First parameter is the model which this model belongs to.
                // Second parameter is the column name to consider when
                // printing the relationship.
                // Third parameter is the primary key to consider for
                // building the relationship
                ->setInput(new BelongsToInput('Author', 'name', 'id')),

            'published_at' => (new LaradminField('Written in'))
                ->setWidget(new DateWidget())
                ->setInput(new TextInput()),
        ];
    }
}
