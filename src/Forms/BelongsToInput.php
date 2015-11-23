<?php

namespace Laradmin\Forms;

use Laradmin\Laradmin;
use Laradmin\Forms\InputInterface;

/**
 * Class TextInput
 * @package Laradmin\Forms
 */
class BelongsToInput implements InputInterface
{
    /**
     * @var
     */
    private $parentModel;

    /**
     * @var string
     */
    private $printableColumn;

    /**
     * @var string
     */
    private $parentPrimaryKeyColumn;

    /**
     * BelongsToInput constructor.
     * @param $parentModel
     * @param $printableColumn
     * @param $parentPrimaryKeyColumn
     */
    public function __construct($parentModel, $printableColumn, $parentPrimaryKeyColumn='id')
    {
        $this->parentModel = $parentModel;
        $this->printableColumn = $printableColumn;
        $this->parentPrimaryKeyColumn = $parentPrimaryKeyColumn;
    }

    /**
     * @return mixed
     */
    public function getParentModel()
    {
        return $this->parentModel;
    }

    /**
     * @return string
     */
    public function getPrintableColumn()
    {
        return $this->printableColumn;
    }

    /**
     * @return string
     */
    public function getParentPrimaryKeyColumn()
    {
        return $this->parentPrimaryKeyColumn;
    }

    public function render($row, $field_name, $label)
    {
        $model = Laradmin::getModelFullClassPath($this->getParentModel());
        $parent_primary_key_column = $this->getParentPrimaryKeyColumn();
        $related_rows = $model::lists($parent_primary_key_column, $this->getPrintableColumn());
        $field_name = implode('_', [$field_name, $parent_primary_key_column]);

        return view('laradmin::inputs/belongs_to_input',
            compact('field_name', 'label', 'related_rows', 'parent_primary_key_column'));
    }
}
