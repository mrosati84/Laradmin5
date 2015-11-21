<?php

namespace Laradmin\Controllers;

use Illuminate\Routing\Controller;

use Laradmin\Laradmin;
use Laradmin\Data\LaradminModelManager;

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
     * @var LaradminModelManager
     */
    private $modelManager;

    /**
     * @var string
     */
    private $modelClassPath;
    /**
     * @var
     */
    private $model_manager;

    /**
     * LaradminBaseController constructor.
     *
     * @param string $model
     * @param LaradminModelManager $model_manager
     */
    public function __construct($model, $model_manager)
    {
        $this->model = $model; // Model name is injected using Laravel IoC container.
        $this->modelClassPath = implode('\\', [Laradmin::getModelsNamespace(), $model]);
        $this->modelManager = $model_manager;
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
        $model = $this->getModel();
        $rows = $this->modelManager->all();

        return view('laradmin::index', compact(['model', 'rows']));
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