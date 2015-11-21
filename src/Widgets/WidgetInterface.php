<?php

namespace Laradmin\Widgets;

interface WidgetInterface
{
    public function render($row, $field_name);
}