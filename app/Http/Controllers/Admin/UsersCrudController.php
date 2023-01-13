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


        $this->crud->addColumn([
            'name'        => 'identifier',
            'label'       => 'Identifier',
            'searchLogic' => function ($query, $column, $searchTerm) {
                $query->orWhere('identifier', 'like', '%'.$searchTerm.'%');
            }
        ]);

        $this->crud->addColumn([
            'name'        => 'group',
            'label'       => 'Gruppe',
            'searchLogic' => function ($query, $column, $searchTerm) {
                $query->orWhere('group', 'like', '%'.$searchTerm.'%');
            }
        ]);

        $this->crud->addColumn([
            'name'        => 'firstname',
            'label'       => 'Vorname',
            'searchLogic' => function ($query, $column, $searchTerm) {
                $query->orWhere('firstname', 'like', '%'.$searchTerm.'%');
            }
        ]);

        $this->crud->addColumn([
            'name'        => 'lastname',
            'label'       => 'Nachname',
            'searchLogic' => function ($query, $column, $searchTerm) {
                $query->orWhere('lastname', 'like', '%'.$searchTerm.'%');
            }
        ])

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

    protected function setupUpdateOperation()
    {
        if (backpack_user()->hasRole('Admin')) {
            $this->crud->addField([
                'name' => 'group',
                'label' => 'Gruppe',
                'type' => 'enum',
                'options' => [
                    'superadmin' => 'superadmin',
                    'admin' => 'admin',
                    'mod' => 'mod',
                    'user' => 'user'
                ],
                'placeholder' => 'Gruppe',
                'validationRules' => 'required',
                'validationMessages' => [
                    'required' => 'Pflichtfeld, kann nicht leer sein!',
                    'max' => 'Zu viele Zeichen!',
                ]
            ]);
        }

        $this->crud->addField([
            'name' => 'firstname',
            'label' => 'Vorname',
            'type' => 'text',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein!',
            ]
        ]);

        $this->crud->addField([
            'name' => 'lastname',
            'label' => 'Nachname',
            'type' => 'text',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein!',
            ]
        ]);

        $this->crud->addField([
            'name' => 'inventory',
            'label' => 'Inventar',
            'type' => 'text',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein!',
            ]
        ]);

        $this->crud->addField([
            'name' => 'accounts',
            'label' => 'Accounting Dinge',
            'type' => 'text',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein!',
            ]
        ]);

        $this->crud->addField([
            'name' => 'job',
            'label' => 'Job // Siehe Jobs Tabelle!',
            'type' => 'text',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein!',
            ]
        ]);

        $this->crud->addField([
            'name' => 'job_grade',
            'label' => 'Jobgrade // Siehe Jobs Grades Tabelle!',
            'type' => 'number',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein!',
            ]
        ]);

        $this->crud->addField([
            'name' => 'loadout',
            'label' => 'Loadout',
            'type' => 'text',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein! Falls leer dann []',
            ]
        ]);

        $this->crud->addField([
            'name' => 'position',
            'label' => 'Position',
            'type' => 'text',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein! Falls leer dann []',
            ]
        ]);

        $this->crud->addField([
            'name' => 'skin',
            'label' => 'Skin',
            'type' => 'text',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein! Falls leer dann []',
            ]
        ]);

        $this->crud->addField([
            'name' => 'lore',
            'label' => 'Lore',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'dateofbirth',
            'label' => 'Geburtsdatum // Format: yyyy-mm-dd',
            'type' => 'text',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein! Falls leer dann []',
            ]
        ]);

        $this->crud->addField([
            'name' => 'height',
            'label' => 'Größe',
            'type' => 'text',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein! Falls leer dann UNKNOWN',
            ]
        ]);

        $this->crud->addField([
            'name' => 'sex',
            'label' => 'Geschlecht',
            'type' => 'enum',
            'options' => [
                'm' => 'Männlich',
                'w' => 'Weiblich',
            ],
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein! Falls leer dann UNKNOWN',
            ]
        ]);

        $this->crud->addField([
            'name' => 'metadata',
            'label' => 'Metadaten',
            'type' => 'text',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein! Falls leer dann UNKNOWN',
            ]
        ]);

        $this->crud->addField([
            'name' => 'status',
            'label' => 'Spielerstatus',
            'type' => 'text',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein! Falls leer dann UNKNOWN',
            ]
        ]);

        $this->crud->addField([
            'name' => 'apps',
            'label' => 'Apps',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'widget',
            'label' => 'Widget',
            'type' => 'text',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein! Falls leer dann UNKNOWN',
            ]
        ]);

        $this->crud->addField([
            'name' => 'bt',
            'label' => 'BT',
            'type' => 'number',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein! Falls leer dann UNKNOWN',
            ]
        ]);

        $this->crud->addField([
            'name' => 'charinfo',
            'label' => 'Charakterinfo',
            'type' => 'text',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein! Falls leer dann UNKNOWN',
            ]
        ]);

        $this->crud->addField([
            'name' => 'cryptocurrency',
            'label' => 'Cryptowährung',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'cryptocurrencytransfers',
            'label' => 'Cryptowährung Transfers',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'phone_number',
            'label' => 'Telefonnummer',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'cd_identity',
            'label' => 'CD Identität',
            'type' => 'text',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein! Falls leer dann UNKNOWN',
            ]
        ]);

        $this->crud->addField([
            'name' => 'einreise_status',
            'label' => 'Einreise Status',
            'type' => 'switch',
        ]);

        $this->crud->addField([
            'name' => 'skills',
            'label' => 'Skills',
            'type' => 'text',
            'validationRules' => 'required',
            'validationMessages' => [
                'required' => 'Pflichtfeld, kann nicht leer sein! Falls leer dann UNKNOWN',
            ]
        ]);

        $this->crud->addField([
            'name' => 'phonePos',
            'label' => 'Telefon Position',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'spotify',
            'label' => 'Spotify',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'inside',
            'label' => 'Inside',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'iban',
            'label' => 'Iban',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'pincode',
            'label' => 'Pincode',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'mainMailadres',
            'label' => 'Haupt Mailadresse',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'first_screen_showed',
            'label' => 'Ersten Screen gesehen',
            'type' => 'switch',
        ]);

        $this->crud->addField([
            'name' => 'disabled',
            'label' => 'Deaktiviert',
            'type' => 'switch',
        ]);


        $this->crud->setValidation();
    }
}
