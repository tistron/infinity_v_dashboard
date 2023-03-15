<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OwnedVehiclesRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class OwnedVehiclesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class OwnedVehiclesCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\OwnedVehicles::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/owned-vehicles');
        CRUD::setEntityNameStrings('Fahrzeuge', 'Fahrzeuge');

        if (backpack_user()->hasRole('Admin'))
        {

        }
        else if (backpack_user()->hasRole('Supporter'))
        {
            $this->crud->denyAccess(['update', 'create', 'delete']);
        }
        else
        {
            $this->crud->denyAccess(['update', 'create', 'delete', 'list']);
        }
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->removeButton('create');

        $this->crud->addColumn([
            'name'        => 'owner',
            'label'       => 'Owner',
            'searchLogic' => function ($query, $column, $searchTerm) {
                $query->orWhere('owner', 'like', '%'.$searchTerm.'%');
            }
        ]);

        $this->crud->addColumn([
            'name'        => 'plate',
            'label'       => 'Plate',
            'searchLogic' => function ($query, $column, $searchTerm) {
                $query->orWhere('plate', 'like', '%'.$searchTerm.'%');
            }
        ]);

        $this->crud->addColumn([
            'name'        => 'plate',
            'label'       => 'Plate',
            'searchLogic' => function ($query, $column, $searchTerm) {
                $query->orWhere('plate', 'like', '%'.$searchTerm.'%');
            }
        ]);

        $this->crud->addColumn([
            'name'        => 'vehicle',
            'label'       => 'Vehicle',
            'searchLogic' => function ($query, $column, $searchTerm) {
                $query->orWhere('vehicle', 'like', '%'.$searchTerm.'%');
            }
        ]);

        CRUD::column('type')->type('string');
        CRUD::column('stored')->type('int');
        CRUD::column('lasthouse')->type('int');
        CRUD::column('model')->type('string');
        CRUD::column('carseller')->type('int');
        CRUD::column('garage')->type('string');
        CRUD::column('fuel')->type('int');
        CRUD::column('engine')->type('float');
        CRUD::column('body')->type('float');
        CRUD::column('state')->type('int');
        CRUD::column('bodyDamage')->type('string');
        CRUD::column('job')->type('string');
    }

    protected function setupUpdateOperation()
    {
        $this->crud->addField([
            'name' => 'owner',
            'label' => 'Besitzer // Identifier von User Tabelle nutzen',
            'type' => 'text',
            'placeholder' => 'Identifier',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein!',
            ]
        ]);

        $this->crud->addField([
            'name' => 'plate',
            'label' => 'Nummernschild',
            'type' => 'text',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein!',
            ]
        ]);

        $this->crud->addField([
            'name' => 'vehicle',
            'label' => 'Fahrzeug',
            'type' => 'text',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein!',
            ]
        ]);

        $this->crud->addField([
            'name' => 'type',
            'label' => 'Typ',
            'type' => 'text',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein!',
            ]
        ]);

        $this->crud->addField([
            'name' => 'stored',
            'label' => 'In Garage?',
            'type' => 'switch',
        ]);

        $this->crud->addField([
            'name' => 'lasthouse',
            'label' => 'Lasthouse',
            'type' => 'number',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein!',
            ]
        ]);

        $this->crud->addField([
            'name' => 'model',
            'label' => 'Modell',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'carseller',
            'label' => 'Verkäufer',
            'type' => 'number',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein!',
            ]
        ]);

        $this->crud->addField([
            'name' => 'garage',
            'label' => 'Garage',
            'type' => 'text',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein!',
            ]
        ]);

        $this->crud->addField([
            'name' => 'fuel',
            'label' => 'Treibstoff',
            'type' => 'number',
            'validationRules' => 'required|max:100',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein!',
                'max' => 'Maximal 100'
            ]
        ]);

        $this->crud->addField([
            'name' => 'engine',
            'label' => 'Motor',
            'type' => 'number',
            'validationRules' => 'required|max:1000',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein!',
                'max' => 'Maximal 1000'
            ]
        ]);

        $this->crud->addField([
            'name' => 'body',
            'label' => 'Karosserie',
            'type' => 'number',
            'validationRules' => 'required|max:1000',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein!',
                'max' => 'Maximal 1000'
            ]
        ]);

        $this->crud->addField([
            'name' => 'state',
            'label' => 'Status',
            'type' => 'switch',
        ]);

        $this->crud->addField([
            'name' => 'bodyDamage',
            'label' => 'Karosserie-Schaden',
            'type' => 'text',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein! Default []',
            ]
        ]);

        $this->crud->addField([
            'name' => 'job',
            'label' => 'Job',
            'type' => 'text',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein!',
            ]
        ]);

        $this->crud->setValidation();
    }
}
