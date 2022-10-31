<?php

namespace App\Http\Controllers;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\PermissionManager\app\Http\Requests\UserStoreCrudRequest as StoreRequest;
use Backpack\PermissionManager\app\Http\Requests\UserUpdateCrudRequest as UpdateRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use File;





class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation { update as traitUpdate; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;



    public function setup()
    {
        $this->crud->setModel(config('backpack.permissionmanager.models.user'));
        $this->crud->setEntityNameStrings(trans('backpack::permissionmanager.user'), trans('backpack::permissionmanager.users'));
        $this->crud->setRoute(backpack_url('user'));
    }

    public function setupListOperation()
    {
        // $this->crud->enableDetailsRow();
        // $this->crud->showDetailsRow();
        $this->crud->addColumns([
            [
                'name'  => 'name',
                'label' => trans('backpack::permissionmanager.name'),
                'type'  => 'text',
            ],
            [
                'name'  => 'email',
                'label' => trans('backpack::permissionmanager.email'),
                'type'  => 'email',
            ],
            [
                'name'  => 'profile',
                'label' => 'Profile',
                'type'  => 'image',
            ],
            [ // n-n relationship (with pivot table)
                'label'     => trans('backpack::permissionmanager.roles'), // Table column heading
                'type'      => 'select_multiple',
                'name'      => 'roles', // the method that defines the relationship in your Model
                'entity'    => 'roles', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model'     => config('permission.models.role'), // foreign key model
            ],
            [ // n-n relationship (with pivot table)
                'label'     => trans('backpack::permissionmanager.extra_permissions'), // Table column heading
                'type'      => 'select_multiple',
                'name'      => 'permissions', // the method that defines the relationship in your Model
                'entity'    => 'permissions', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model'     => config('permission.models.permission'), // foreign key model
            ],
        ]);

        // Role Filter
        $this->crud->addFilter(
            [
                'name'  => 'role',
                'type'  => 'dropdown',
                'label' => trans('backpack::permissionmanager.role'),
            ],
            config('permission.models.role')::all()->pluck('name', 'id')->toArray(),
            function ($value) { // if the filter is active
                $this->crud->addClause('whereHas', 'roles', function ($query) use ($value) {
                    $query->where('role_id', '=', $value);
                });
            }
        );

        // Extra Permission Filter
        $this->crud->addFilter(
            [
                'name'  => 'permissions',
                'type'  => 'select2',
                'label' => trans('backpack::permissionmanager.extra_permissions'),
            ],
            config('permission.models.permission')::all()->pluck('name', 'id')->toArray(),
            function ($value) { // if the filter is active
                $this->crud->addClause('whereHas', 'permissions', function ($query) use ($value) {
                    $query->where('permission_id', '=', $value);
                });
            }
        );
    }

    public function setupCreateOperation()
    {
        $this->addUserFields();
        CRUD::field('id')->type('hidden');
        CRUD::addfield('firstname');
        CRUD::addfield('lastname');
        CRUD::addfield('address');
        CRUD::addfield('email');
        CRUD::addfield('business_name');
        CRUD::addfield('phone');
        CRUD::addfield('landmark');
        // CRUD::addfield('city');
        CRUD::addField([
            'name'      => 'city',
            'type'      => 'select_from_array',
            'label'     => 'City',
            'options'   => [
                1 => "New York",
                2 => "Los Angeles",
                3 => "Chicago",
                4 => "Brooklyn"
            ]
        ]);
        CRUD::addField([
            'name'      => 'state',
            'type'      => 'select_from_array',
            'label'     => 'State',
            'options'   => [
                1 => "Alabama",
                2 => "Alaska",
                3 => "California",
                4 => "Colorado"
            ]
        ]);
        // CRUD::addfield('state');
        CRUD::addfield('zipcode');
        CRUD::addfield([
            'name' => 'profile',
            'type' => 'image',
            'label' => "Profile Picture",
        ]);
        CRUD::addfield('bio_information');
        $this->crud->setValidation(StoreRequest::class);
    }
    protected function setupShowOperation()
    {
        CRUD::column('name');
        CRUD::column('email');
        CRUD::column('firstname');
        CRUD::column('lastname');
        CRUD::column('address');
        CRUD::column('business_name');
        CRUD::column('phone');
        CRUD::column('landmark');
        CRUD::column('city');
        CRUD::column('state');
        CRUD::column('zipcode');
        // CRUD::Column('profile');
        CRUD::addColumn([
            'name'      => 'profile',
            'label'     => 'profile',
            'type'      => 'image',
            'height' => '30px',
            'width'  => '30px',
        ]);
        CRUD::column('bio_information');
    }

    public function setupUpdateOperation()
    {
        $this->addUserFields();
        CRUD::field('id')->type('hidden');
        CRUD::addfield('firstname');
        CRUD::addfield('lastname');
        CRUD::addfield('address');
        CRUD::addfield('email');
        CRUD::addfield('business_name');
        CRUD::addfield('phone');
        CRUD::addfield('landmark');
        // CRUD::addfield('city');
        CRUD::addField([
            'name'      => 'city',
            'type'      => 'select_from_array',
            'label'     => 'City',
            'options'   => [
                "New York" => "New York",
                "Los Angeles" => "Los Angeles",
                "Chicago" => "Chicago",
                "Brooklyn" => "Brooklyn"
            ]
        ]);
        CRUD::addField([
            'name'      => 'state',
            'type'      => 'select_from_array',
            'label'     => 'State',
            'options'   => [
                "Alabama" => "Alabama",
                "Alaska" => "Alaska",
                "California" => "California",
                "Colorado" => "Colorado"
            ]
        ]);
        // CRUD::addfield('state');
        CRUD::addfield('zipcode');
        CRUD::addfield([
            'name' => 'profile',
            'type' => 'image',
            'label' => "Profile Picture",
        ]);
        CRUD::addfield('bio_information');



        $this->crud->setValidation(UpdateRequest::class);
    }

    /**
     * Store a newly created resource in the database.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $this->crud->setRequest($this->crud->validateRequest());
        $this->crud->setRequest($this->handlePasswordInput($this->crud->getRequest()));
        $this->crud->unsetValidation(); // validation has already been run
        $response = $this->traitStore();
        $id = $this->crud->entry->id;

        // $file = $request->profile;
        // $path = storage_path('/app/public/image/');
        // $extension = explode('/', mime_content_type($file))[1];
        // // dd($extension);
        // $filename = uniqid(). '.' . $extension ;
        // // dd($filename);
        // $file->move($path,$filename);

        $data = User::find($id);
        $data->firstname = $request->firstname;
        $data->lastname = $request->lastname;
        $data->address = $request->address;
        $data->business_name = $request->business_name;
        $data->phone = $request->phone;
        $data->landmark = $request->landmark;
        $data->city = $request->city;
        $data->state = $request->state;
        $data->zipcode = $request->zipcode;
        $data->profile_pic = $request->profile;
        $data->bio_information = $request->bio_information;
        $data->save();

        return $response;

    }

    /**
     * Update the specified resource in the database.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request)
    {
        // dd($request->id);
        $this->crud->setRequest($this->crud->validateRequest());
        $this->crud->setRequest($this->handlePasswordInput($this->crud->getRequest()));
        $this->crud->unsetValidation(); // validation has already been run

        $response = $this->traitUpdate();

        $data = User::find($request->id);
        $data->firstname = $request->firstname;
        $data->lastname = $request->lastname;
        $data->address = $request->address;
        $data->business_name = $request->business_name;
        $data->phone = $request->phone;
        $data->landmark = $request->landmark;
        $data->city = $request->city;
        $data->state = $request->state;
        $data->zipcode = $request->zipcode;
        $data->profile_pic = $request->profile;
        $data->bio_information = $request->bio_information;
        $data->save();

        return $response;
    }

    /**
     * Handle password input fields.
     */
    protected function handlePasswordInput($request)
    {
        // Remove fields not present on the user.
        $request->request->remove('password_confirmation');
        $request->request->remove('roles_show');
        $request->request->remove('permissions_show');

        // Encrypt password if specified.
        if ($request->input('password')) {
            $request->request->set('password', Hash::make($request->input('password')));
        } else {
            $request->request->remove('password');
        }

        return $request;
    }

    protected function addUserFields()
    {
        $this->crud->addFields([
            [
                'name'  => 'name',
                'label' => trans('backpack::permissionmanager.name'),
                'type'  => 'text',
            ],
            [
                'name'  => 'email',
                'label' => trans('backpack::permissionmanager.email'),
                'type'  => 'email',
            ],
            [
                'name'  => 'password',
                'label' => trans('backpack::permissionmanager.password'),
                'type'  => 'password',
            ],
            [
                'name'  => 'password_confirmation',
                'label' => trans('backpack::permissionmanager.password_confirmation'),
                'type'  => 'password',
            ],
            [
                // two interconnected entities
                'label'             => trans('backpack::permissionmanager.user_role_permission'),
                'field_unique_name' => 'user_role_permission',
                'type'              => 'checklist_dependency',
                'name'              => ['roles', 'permissions'],
                'subfields'         => [
                    'primary' => [
                        'label'            => trans('backpack::permissionmanager.roles'),
                        'name'             => 'roles', // the method that defines the relationship in your Model
                        'entity'           => 'roles', // the method that defines the relationship in your Model
                        'entity_secondary' => 'permissions', // the method that defines the relationship in your Model
                        'attribute'        => 'name', // foreign key attribute that is shown to user
                        'model'            => config('permission.models.role'), // foreign key model
                        'pivot'            => true, // on create&update, do you need to add/delete pivot table entries?]
                        'number_columns'   => 3, //can be 1,2,3,4,6
                    ],
                    'secondary' => [
                        'label'          => ucfirst(trans('backpack::permissionmanager.permission_singular')),
                        'name'           => 'permissions', // the method that defines the relationship in your Model
                        'entity'         => 'permissions', // the method that defines the relationship in your Model
                        'entity_primary' => 'roles', // the method that defines the relationship in your Model
                        'attribute'      => 'name', // foreign key attribute that is shown to user
                        'model'          => config('permission.models.permission'), // foreign key model
                        'pivot'          => true, // on create&update, do you need to add/delete pivot table entries?]
                        'number_columns' => 3, //can be 1,2,3,4,6
                    ],
                ],
            ],
        ]);
    }
}
