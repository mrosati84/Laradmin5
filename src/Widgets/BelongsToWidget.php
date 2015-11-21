<?php

namespace Laradmin\Widgets;

use Laradmin\Widgets\WidgetInterface;

/**
 * Class BelongsToWidget
 * @package Laradmin\Widgets
 */
class BelongsToWidget implements WidgetInterface
{
    /**
     * @var
     */
    private $column;

    /**
     * @var
     */
    private $model;

    /**
     * BelongsToWidget constructor.
     *
     * @param $column
     * @param $model
     */
    public function __construct($column, $model)
    {
        $this->column = $column;
        $this->model = $model;
    }

    /**
     * @return string
     */
    public function getColumn()
    {
        return $this->column;
    }

    /**
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    public function render($row, $field_name)
    {
        $id = $row->id;
        $column = $this->getColumn();
        $model = strtolower($this->getModel());
        $value = $row->$field_name->$column;

        return view('laradmin::widgets/belongs_to_widget', compact('id', 'value', 'model'));
    }
}
