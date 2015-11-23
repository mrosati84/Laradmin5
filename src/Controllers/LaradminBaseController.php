<?php

namespace Laradmin\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;

use Illuminate\View\View;
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
     * @return LaradminModelManager
     */
    public function getModelManager()
    {
        return $this->modelManager;
    }

    /**
     * @param LaradminModelManager $modelManager
     */
    public function setModelManager($modelManager)
    {
        $this->modelManager = $modelManager;
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

    /**
     * @return View
     */
    public function index()
    {
        $model = $this->getModel();
        $rows = $this->getModelManager()->all();
        $fields = $this->getModelFields();
        $actions = $this->getModelDefaultActions();

        return view('laradmin::index', compact(['model', 'rows', 'fields', 'actions']));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function edit($id)
    {
        $model = $this->getModel();
        $row = $this->getModelManager()->find($id);
        $fields = $this->getModelFields();
        $form_action = Laradmin::generateRouteForModel($model, 'update', ['id' => $id]);

        return view('laradmin::edit', compact(['model', 'row', 'fields', 'form_action']));
    }

    /**
     * @param $id
     * @return string
     */
    public function show($id)
    {
        return 'show ' . $id;
    }

    /**
     * @return string
     */
    public function store()
    {
        return 'store';
    }

    /**
     * @return string
     */
    public function create()
    {
        return 'create';
    }

    /**
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        $model = $this->getModel();
        $row = $this->getModelManager()->find($id);
        $fields = $this->getModelFields();

        foreach ($fields as $field_name => $field_properties)
        {
            $row->$field_name = Request::input($field_name);
        }

        $row->save();

        return Redirect::to(Laradmin::generateRouteForModel($model, 'index'));
    }

    /**
     * @param $id
     * @return string
     */
    public function destroy($id)
    {
        return 'destroy ' . $id;
    }
}