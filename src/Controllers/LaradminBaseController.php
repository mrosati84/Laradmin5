<?php

namespace Laradmin\Controllers;

use Illuminate\Routing\Controller;

use Laradmin\Laradmin;

/**
 * Class LaradminBaseController
 * @package Laradmin\Controllers
 */
class LaradminBaseController extends Controller
{
    /**
     * @var string
     *   Holds a string reference to the current Eloquent model.
     */
    private $model;

    /**
     * @var string
     */
    private $modelClassPath;

    /**
     * LaradminBaseController constructor.
     *
     * @param $model
     */
    public function __construct($model)
    {
        $this->model = $model;
        $this->modelClassPath = implode('\\', [Laradmin::getModelsNamespace(), $model]);
    }

    /**
     * Get the plain name of the model class, without namespace.
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Get the full model class name, including namespace.
     *
     * @return string
     */
    public function getModelClassPath()
    {
        return $this->modelClassPath;
    }

    public function index()
    {
        return view('laradmin::index');
    }

    public function edit($id)
    {
        return 'edit ' . $id;
    }

    public function show($id)
    {
        return 'show ' . $id;
    }

    public function store()
    {
        return 'store';
    }

    public function create()
    {
        return 'create';
    }

    public function update($id)
    {
        return 'update ' . $id;
    }

    public function destroy($id)
    {
        return 'destroy ' . $id;
    }
}