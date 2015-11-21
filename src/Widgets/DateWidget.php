<?php

namespace Laradmin\Widgets;

use DateTime;
use Laradmin\Widgets\WidgetInterface;

/**
 * Class DateWidget
 * @package Laradmin\Widgets
 */
class DateWidget implements WidgetInterface
{
    public function render($row, $field_name)
    {
        $date_object = new DateTime($row->$field_name);
        $date = $date_object->format('F jS, Y');

        return view('laradmin::widgets/date_widget', compact('date'));
    }
}
