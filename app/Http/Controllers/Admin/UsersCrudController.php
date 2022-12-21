<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UsersRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class UsersCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UsersCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Users::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/users');
        CRUD::setEntityNameStrings('users', 'users');

        if (!backpack_user()->hasRole('Admin') || !backpack_user()->hasRole('Supporter'))
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

        CRUD::column('identifier')->type('string');
        CRUD::column('group')->type('string');
        CRUD::column('firstname')->type('string');
        CRUD::column('lastname')->type('string');
        CRUD::column('inventory')->type('string');
        CRUD::column('accounts')->type('string');
        CRUD::column('job')->type('string');
        CRUD::column('job_grade')->type('number');
        CRUD::column('loadout')->type('string');
        CRUD::column('position')->type('string');
        CRUD::column('skin')->type('string');
        CRUD::column('lore')->type('string');
        CRUD::column('dateofbirth')->type('string');
        CRUD::column('height')->type('string');
        CRUD::column('sex')->type('string');
        CRUD::column('metadata')->type('string');
        CRUD::column('status')->type('string');
        CRUD::column('apps')->type('string');
        CRUD::column('widget')->type('string');
        CRUD::column('bt')->type('string');
        CRUD::column('charinfo')->type('string');
        CRUD::column('cryptocurrency')->type('string');
        CRUD::column('cryptocurrencytransfers')->type('string');
        CRUD::column('phone_number')->type('string');
        CRUD::column('cd_identity')->type('string');
        CRUD::column('einreise_status')->type('string');
        CRUD::column('skills')->type('string');
        CRUD::column('phonePos')->type('string');
        CRUD::column('spotify')->type('string');
        CRUD::column('inside')->type('string');
        CRUD::column('iban')->type('string');
        CRUD::column('pincode')->type('string');
        CRUD::column('is_dead')->type('string');
        CRUD::column('mainMailadres')->type('string');
        CRUD::column('registerDate')->type('string');
        CRUD::column('first_screen_showed')->type('number');
        CRUD::column('disabled')->type('number');
    }
}
