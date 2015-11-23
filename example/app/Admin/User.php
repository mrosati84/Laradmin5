<?php

namespace Laravel\Admin;

use Laradmin\Controllers\LaradminBaseController;
use Laradmin\Forms\TextInput;
use Laradmin\Widgets\TextWidget;
use Laradmin\Widgets\EmailWidget;

use Laradmin\Forms\BelongsToInput;
use Laradmin\Fields\LaradminField;

use Laravel\Admin\Actions\BlockAction;
use Laravel\Admin\UserModelManager;

/**
 * Class User
 * @package Laravel\Admin
 */
class User extends LaradminBaseController
{
    /**
     * Get the model fields to handle.
     *
     * @return array
     */
    public function getModelFields()
    {
        return [
            'id' => (new LaradminField('ID'))
                ->setWidget(new TextWidget())
                ->setInput(new TextInput()),

            'name' => (new LaradminField('Full name'))
                ->setWidget(new TextWidget())
                ->setInput(new TextInput()),

            'email' => (new LaradminField('E-mail address'))
                ->setWidget(new EmailWidget())
                ->setInput(new TextInput()),
        ];
    }

    /**
     * Test override this method.
     *
     * @return array
     */
    public function getModelDefaultActions()
    {
        $actions = parent::getModelDefaultActions();

        $actions[] = new BlockAction($this->getModel());

        return $actions;
    }

    /**
     * Override the default Model Manager.
     * This method will be used for default queries.
     *
     * @return UserModelManager
     */
    public function getModelManager()
    {
        return new UserModelManager($this->getModelClassPath());
    }
}
