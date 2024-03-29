<?php

namespace Laradmin\Widgets;

use Laradmin\Widgets\WidgetInterface;

/**
 * Class TextWidget
 * @package Laradmin\Widgets
 */
class TextWidget implements WidgetInterface
{
    public function render($row, $field_name)
    {
        $value = $row->$field_name;

        return view('laradmin::widgets/text_widget', compact('value'));
    }
}
