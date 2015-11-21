<?php

namespace Laradmin\Actions;

/**
 * Interface ActionInterface
 * @package Laradmin\Actions
 */
interface ActionInterface
{
    public function render($row);
}