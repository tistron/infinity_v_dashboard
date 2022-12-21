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
        CRUD::setEntityNameStrings('Owned Vehicles', 'Owned Vehicles');
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

        CRUD::column('owner')->type('string');
        CRUD::column('plate')->type('string');
        CRUD::column('vehicle')->type('string');
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
}
