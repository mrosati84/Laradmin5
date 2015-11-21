<?php

namespace Laradmin\Widgets;

/**
 * Interface WidgetInterface
 * @package Laradmin\Widgets
 */
interface WidgetInterface
{
    public function render($row, $field_name);
}
