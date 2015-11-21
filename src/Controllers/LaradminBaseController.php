<?php

namespace Laradmin\Controllers;

use Illuminate\Routing\Controller;

use Laradmin\Laradmin;
use Laradmin\Data\LaradminModelManager;
use Laradmin\Actions\ShowAction;
use Laradmin\Actions\EditAction;
use Laradmin\Actions\DestroyAction;

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

    /**
     * Return a list of fields to render.
     *
     * @return array
     */
    public function getModelFields()
    {
        // By default, this method returns an empty array of fields.
        // Fill the fields you want to render in your admin classes,
        // by overriding this method.
        return [];
    }

    /**
     * Get the default actions for this model.
     * @return array
     */
    public function getModelDefaultActions()
    {
        $model = $this->getModel();

        return [
            new ShowAction($model),
            new EditAction($model),
            new DestroyAction($model),
        ];
    }

    public function index()
    {
        $model = $this->getModel();
        $rows = $this->modelManager->all();
        $fields = $this->getModelFields();
        $actions = $this->getModelDefaultActions();

        return view('laradmin::index', compact(['model', 'rows', 'fields', 'actions']));
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