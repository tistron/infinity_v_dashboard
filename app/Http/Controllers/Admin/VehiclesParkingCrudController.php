<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\VehiclesParkingRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class VehiclesParkingCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class VehiclesParkingCrudController extends CrudController
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
        CRUD::setModel(\App\Models\VehiclesParking::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/vehicles-parking');
        CRUD::setEntityNameStrings('Fahrzeug Parking', 'Fahrzeug Parking');

        if (!backpack_user()->hasRole('Admin') && !backpack_user()->hasRole('Supporter'))
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
        
        CRUD::column('model')->type('int');
        CRUD::column('status')->type('string');
        CRUD::column('tuning')->type('string');
        CRUD::column('stateBags')->type('int');
        CRUD::column('posX')->type('float');
        CRUD::column('posY')->type('float');
        CRUD::column('posZ')->type('float');
        CRUD::column('rotX')->type('float');
        CRUD::column('rotY')->type('float');
        CRUD::column('rotZ')->type('float');
        CRUD::column('lastUpdate')->type('int');
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->crud->addField([
            'name' => 'model',
            'label' => 'Modell',
            'type' => 'number',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein!',
            ]
        ]);

        $this->crud->addField([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'text',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein!',
            ]
        ]);

        $this->crud->addField([
            'name' => 'tuning',
            'label' => 'Tuning',
            'type' => 'text',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein!',
            ]
        ]);

        $this->crud->addField([
            'name' => 'stateBags',
            'label' => 'State Bags',
            'type' => 'text',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein!',
            ]
        ]);

        $this->crud->addField([
            'name' => 'posX',
            'label' => 'Pos X',
            'type' => 'number',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein!',
            ]
        ]);

        $this->crud->addField([
            'name' => 'posY',
            'label' => 'Pos Y',
            'type' => 'number',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein!',
            ]
        ]);

        $this->crud->addField([
            'name' => 'posZ',
            'label' => 'Pos Z',
            'type' => 'number',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein!',
            ]
        ]);

        $this->crud->addField([
            'name' => 'rotX',
            'label' => 'Rot X',
            'type' => 'number',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein!',
            ]
        ]);

        $this->crud->addField([
            'name' => 'rotY',
            'label' => 'Rot Y',
            'type' => 'number',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein!',
            ]
        ]);

        $this->crud->addField([
            'name' => 'rotZ',
            'label' => 'Rot Z',
            'type' => 'number',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein!',
            ]
        ]);

        $this->crud->setValidation();
    }
}
