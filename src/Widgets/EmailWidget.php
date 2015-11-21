<?php

namespace Laradmin\Widgets;

use Laradmin\Widgets\WidgetInterface;

class EmailWidget implements WidgetInterface
{
    public function render($row, $field_name)
    {
        $email = $row->$field_name;

        return view('laradmin::widgets/email_widget', compact('email'));
    }
}
