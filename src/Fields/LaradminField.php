<?php

namespace Laradmin\Fields;

use Laradmin\Forms\InputInterface;
use Laradmin\Fields\FieldInterface;
use Laradmin\Widgets\WidgetInterface;

/**
 * Class LaradminField
 * @package Laradmin\Fields
 */
class LaradminField implements FieldInterface
{
    /**
     * @var string
     */
    private $label;

    /**
     * @var InputInterface
     */
    private $widget;

    /**
     * @var InputInterface
     */
    private $input;

    /**
     * LaradminField constructor.
     * @param $label
     */
    public function __construct($label)
    {
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @param WidgetInterface $widget
     * @return FieldInterface
     */
    public function setWidget(WidgetInterface $widget)
    {
        $this->widget = $widget;

        // Preserve method chaining.
        return $this;
    }

    /**
     * @param InputInterface $input
     * @return FieldInterface
     */
    public function setInput(InputInterface $input)
    {
        $this->input = $input;

        // Preserve method chaining.
        return $this;
    }

    /**
     * @return WidgetInterface
     */
    public function getWidget()
    {
        return $this->widget;
    }

    /**
     * @return InputInterface
     */
    public function getInput()
    {
        return $this->input;
    }
}