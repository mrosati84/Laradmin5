<?php

namespace Laradmin\Forms;

use Laradmin\Forms\InputInterface;

/**
 * Class TextInput
 * @package Laradmin\Forms
 */
class TextInput implements InputInterface
{
    public function render($row, $field_name, $label)
    {
        return view('laradmin::inputs/text_input', compact('row', 'field_name', 'label'));
    }
}
