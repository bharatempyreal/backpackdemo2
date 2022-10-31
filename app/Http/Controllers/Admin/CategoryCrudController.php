<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Attributes;
use App\Models\Advertisement;
use App\Models\AdvertisementValue;
use App\Models\Category;
use App\Models\AttributesValue;
use Illuminate\Http\Request;
use Alert;
use Backpack\CRUD\app\Library\Widget;



/**
 * Class CategoryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CategoryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Gaspertrix\LaravelBackpackDropzoneField\App\Http\Controllers\Operations\MediaOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; }
    // use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { update as traitUpdate; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation { destroy as traitDestroy; }




    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Category::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/category');
        CRUD::setEntityNameStrings('category', 'categories');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // add a "simple" filter called Draft
        $this->crud->addFilter([
            'type'  => 'simple',
            'name'  => 'draft',
            'label' => 'Status'
        ],
        false,
        function() {
            $this->crud->addClause('where', 'status', '1');
        });
        $this->crud->addFilter([
            'name'  => 'details',
            'type'  => 'text',
            'label' => 'Details'
          ],
          false,
           function($value) { // if the filter is active
            $this->crud->addClause('where', 'details','LIKE', "%$value%");
          });
        $this->crud->setColumns(['name', 'details']);
        CRUD::column('status_name')->label('Status');
        CRUD::addColumn([
            'name'      => 'image',
            'label'     => 'Image',
            'type'      => 'image',
            'height' => '50px',
            'width'  => '50px',
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
    protected function setupCreateOperation()
    {
        CRUD::setValidation(CategoryRequest::class);
        CRUD::field('id')->type('hidden');
        CRUD::addfield([
            'name' => 'image',
            'type' => 'image',
            'label' => "Image",
        ]);
        CRUD::addfield('name');
        CRUD::addfield('details');
        CRUD::addField([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'radio',
            'options' => [
                0 => 'Deactive',
                1 => 'Active',
            ],
            'inline' => true,
            'default' => '1'
        ]);
        Widget::add([
            'type'    => 'script',
            'content' => 'js/user-js/category-update.js'
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
        CRUD::setValidation(CategoryRequest::class);
        CRUD::field('id')->type('hidden');
        CRUD::addfield([
            'name' => 'image',
            'type' => 'image',
            'label' => "Image",
        ]);
        CRUD::addfield('name');
        CRUD::addfield('details');
        CRUD::addField([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'radio',
            'options' => [
                0 => 'Deactive',
                1 => 'Active',
            ],
            'inline' => true,
        ]);
    }
    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);
        $this->crud->setColumns(['name', 'details']);
        CRUD::column('status_name')->label('Status');
        CRUD::addColumn([
            'name'      => 'image',
            'label'     => 'Image',
            'type'      => 'image',
            'height' => '30px',
            'width'  => '30px',
        ]);
    }

    public function destroy($id)
    {
        // Category::where('id',$id)->delete();
        $attributes = Attributes::where('category_id',$id)->where('is_default','!=', 1);
        $attributes_ids = $attributes->pluck('id');

        $advertisement = Advertisement::where('category_id',$id);
        $advertisement_ids = $advertisement->pluck('id');

        $AdvertisementValue = AdvertisementValue::whereIn('advertisement_id',$advertisement_ids);
        $AdvertisementValue_IMG = AdvertisementValue::whereIn('advertisement_id',$advertisement_ids);
        $images = $AdvertisementValue_IMG->whereHas('attribute',function($q){
            $q->where('category_type',3)->orWhere('category_type',6);
        })->get();
        foreach($images as $img){
            if(is_string($img->value) && is_array(json_decode($img->value, true))){
                foreach(json_decode($img->value) as $i){
                    $path = storage_path('/app/public/image/'). $i;
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }
            }else{
                $path = storage_path('/app/public/image/'). $img->value;
                    if (file_exists($path)) {
                        unlink($path);
                    }
            }
        }
        $AdvertisementValue = $AdvertisementValue->delete();
        $advertisement = $advertisement->delete();
        AttributesValue::whereIn('attributes_id',$attributes_ids)->delete();
        $attributes=$attributes->delete();
        return $this->crud->delete($id);
    }

}
