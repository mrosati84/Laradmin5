<?php

namespace Laradmin\Widgets;

use Laradmin\Laradmin;
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
     * @var string
     */
    private $parentPrimaryKeyColumn;

    /**
     * BelongsToWidget constructor.
     *
     * @param $column
     * @param $model
     * @param $parentPrimaryKeyColumn
     */
    public function __construct($column, $model, $parentPrimaryKeyColumn='id')
    {
        $this->column = $column;
        $this->model = $model;
        $this->parentPrimaryKeyColumn = $parentPrimaryKeyColumn;
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

    /**
     * @return string
     */
    public function getParentPrimaryKeyColumn()
    {
        return $this->parentPrimaryKeyColumn;
    }

    public function render($row, $field_name)
    {
        $parent_primary_key_column = $this->getParentPrimaryKeyColumn();
        $column = $this->getColumn();
        $model = strtolower($this->getModel());
        $id = $row->$field_name->$parent_primary_key_column;
        $value = $row->$field_name->$column;
        $link_to_related = Laradmin::generateRouteForModel($model, 'show',
            ['id' => $id]);

        return view('laradmin::widgets/belongs_to_widget',
            compact('id', 'value', 'link_to_related'));
    }
}
