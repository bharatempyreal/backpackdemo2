<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdvertisementRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Attributes;
use App\Models\Advertisement;
use App\Models\AdvertisementValue;
use Backpack\CRUD\app\Library\Widget;
use Illuminate\Http\Request;



/**
 * Class AdvertisementCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AdvertisementCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Advertisement::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/advertisement');
        CRUD::setEntityNameStrings('advertisement', 'advertisements');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::field('category_id');
        $this->crud->addColumns(['category_id']);

        $this->crud->addColumn('Name', [
            'label' => 'Name',
            'type' => 'relationship',
            'name' => '', // the db column for the foreign key
            'entity' => 'advertisementdata', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => 'App\Models\Advertisement' // foreign key model
        ]);

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */

    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);
        CRUD::addColumn('category_id');
        CRUD::addColumn([
            'name'      => 'advertisement',
            'label'     => 'Attribute Value',
            'type'     => 'closure',
            'function' => function($entry) {
                $data = $entry->advertisementdata;
                dd($data);
                $arr=[];
                foreach ($data as $key) {
                    $arr[]= $key->id;
                }
                $entry = AttributesValue::whereIn('id',$arr)->get();
                return view('vendor.return.attribute_valuedata', ['entry' => $entry])->render();
            }
        ]);
    }
    protected function setupCreateOperation()
    {

        CRUD::setValidation(AdvertisementRequest::class);

        CRUD::field('id')->type('hidden');
        CRUD::field('category_id')->wrapper(['class' => 'form-group col-md-4 select_category','id' => 'select_category', 'data-action' => route('getadvertisement')]);
        CRUD::addfield(
            [
                'name'     => 'my_custom_html',
                'label'    => 'Custom HTML',
                'type'     => 'custom_html',
                'value'    => '<div class ="custom_html"></div>',
                'wrapper' => ['class' => 'form-group col-md-12 d-none htmlview','id' => 'htmlview']
            ],
        );
        Widget::add([
            'type'    => 'script',
            'content' => 'js/user-js/advertisement.js'
        ]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        // $this->setupCreateOperation();
        CRUD::setValidation(AdvertisementRequest::class);
        CRUD::field('category_id')->wrapper(['class' => 'form-group col-md-4 select_category','id' => 'select_category', 'data-action' => route('getadvertisement')]);

        CRUD::addfield(
            [
                'name'     => 'my_custom_html',
                'label'    => 'Custom HTML',
                'type'     => 'custom_html',
                'value'    => '<div class ="custom_html"></div>',
                'wrapper' => ['class' => 'form-group col-md-12 htmlview','id' => 'htmlview']
            ],
        );
        Widget::add([
            'type'    => 'script',
            'content' => 'js/user-js/advertisement.js'
        ]);

    }

    public function getadvertisement(Request $request)
    {
        $attributeData = Attributes::where('category_id', $request->selected)->get();
        $crudFields = [];
        foreach($attributeData as $key => $value) {

            switch ($value->category_type) {

                case 1:
                    $options = [];
                    foreach($value->attributesdata as $key => $val) {
                        $options[$val->attribute_name] = $val->attribute_name;
                    }
                    $crudFields[]  = array(
                        'name'      => $value->name,
                        'label'     => ucFirst($value->name),
                        'type'      => 'checklist-new',
                        'wrapper'   => ['class' => 'form-group col-md-4 pl-5'],
                        'options'   => $options,
                    );
                    $crudFields[]  = array(
                        'name'      => $value->name.'_id',
                        'type'      => 'hidden',
                        'value'     => $value->id
                    );
                    break;
                case 2:
                    $options = [];
                    foreach($value->attributesdata as $key => $val) {
                        $options[$val->attribute_name] = $val->attribute_name;
                    }
                    $crudFields[] = array(
                        'name'      => $value->name,
                        'label'     => ucFirst($value->name),
                        'type'      => 'select2_from_array',
                        'options'   =>  $options,
                    );
                    $crudFields[]  = array(
                        'name'      => $value->name.'_id',
                        'type'      => 'hidden',
                        'value'     => $value->id
                    );
                    break;
                case 3:
                    $crudFields[] = array(
                        'name'      => $value->name,
                        'label'     => ucFirst($value->name),
                        'filename'     => "image_filename", // set to null if not needed
                        'type'         => 'base64_image',
                        'aspect_ratio' => 1, // set to 0 to allow any aspect ratio
                        'crop'         => true, // set to true to allow cropping, false to disable
                        'src'          => NULL,

                    );
                    $crudFields[]  = array(
                        'name'      => $value->name.'_id',
                        'type'      => 'hidden',
                        'value'     => $value->id
                    );
                    break;
                case 4:
                    $crudFields[] = array(
                        'name'      => $value->name,
                        'label'     => ucFirst($value->name),
                        'type'      => 'text',
                    );
                    $crudFields[]  = array(
                        'name'      => $value->name.'_id',
                        'type'      => 'hidden',
                        'value'     => $value->id
                    );
                    break;
                case 5:
                    $crudFields[] = array(
                        'name'      => $value->name,
                        'label'     => ucFirst($value->name),
                        'type'      => 'textarea',
                    );
                    $crudFields[]  = array(
                        'name'      => $value->name.'_id',
                        'type'      => 'hidden',
                        'value'     => $value->id
                    );
                    break;
                case 6:
                    $crudFields[] = array(
                        'name'      => $value->name,
                        'label'     => ucFirst($value->name),
                        'type'      => 'image',
                        'upload'    => true,
                    );
                    $crudFields[]  = array(
                        'name'      => $value->name.'_id',
                        'type'      => 'hidden',
                        'value'     => $value->id
                    );
                    break;
                case 7:
                    $crudFields[] = array(
                        'name'      => $value->name,
                        'label'     => ucFirst($value->name),
                        'type'      => 'date',
                    );
                    $crudFields[]  = array(
                        'name'      => $value->name.'_id',
                        'type'      => 'hidden',
                        'value'     => $value->id
                    );
                    break;
                default:

            }
        }

        $this->crud->fields = $crudFields;
        $view = \View::make('vendor.backpack.crud.advertisement_form', [ 'fields' => $crudFields, 'action' => 'create' , 'crud' => $this->crud]);
        $view = $view->render();
        $view = html_entity_decode($view);
        return response()->json(array('success' => true, 'view'=>$view));
    }

    public function store(Request $request)
    {
        dd($request->all());

        $fiels=array_keys($request->all());
        unset($fiels[0]);
        unset($fiels[1]);
        unset($fiels[2]);
        unset($fiels[3]);
        foreach($fiels as $k=>$f){
            if(substr($f, -3) == '_id' || $f == 'save_action'){
                unset($fiels[$k]);
            }
        }

        $items = new Advertisement;
        $items ->category_id = $request->category_id;
        $items->save();
        if($items->save()){
            foreach($fiels as $value){
                $attributes_id = $value.'_id';
                $advertisement_value = New AdvertisementValue;
                $advertisement_value->advertisement_id = $items->id;
                $advertisement_value->value = $request->$value;
                $advertisement_value->name = $value;
                $advertisement_value->attributes_id = $request->$attributes_id;
                $advertisement_value->save();
             }
        }
        return redirect()->back();
    }
    public function update(Request $request)
    {
        // dd($request->all());

        $fiels=array_keys($request->all());
        unset($fiels[0]);
        unset($fiels[1]);
        unset($fiels[2]);
        unset($fiels[3]);
        foreach($fiels as $k=>$f){
            if(substr($f, -3) == '_id' || $f == 'save_action'){
                unset($fiels[$k]);
            }
        }

        $items = new Advertisement;
        $items ->category_id = $request->category_id;
        $items->save();
        if($items->save()){
            foreach($fiels as $value){
                $attributes_id = $value.'_id';
                $advertisement_value = New AdvertisementValue;
                $advertisement_value->advertisement_id = $items->id;
                $advertisement_value->value = $request->$value;
                $advertisement_value->name = $value;
                $advertisement_value->attributes_id = $request->$attributes_id;
                $advertisement_value->save();
             }
        }
        return redirect()->back();
    }
}
