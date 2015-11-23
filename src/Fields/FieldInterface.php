<?php

namespace Laradmin\Fields;

use Laradmin\Widgets\WidgetInterface;
use Laradmin\Forms\InputInterface;

/**
 * Interface FieldInterface
 * @package Laradmin\Fields
 */
interface FieldInterface
{
    public function setWidget(WidgetInterface $widget);
    public function setInput(InputInterface $input);
}
