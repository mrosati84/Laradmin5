<?php

namespace Laradmin\Forms;

/**
 * Interface InputInterface
 * @package Laradmin\Forms
 */
interface InputInterface
{
    public function render($row, $field_name, $label);
}