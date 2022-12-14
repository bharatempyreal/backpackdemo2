<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'attributes';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    protected $appends = ['type_name','is_default_name','is_compulsory_name', 'status_name', 'attributesvalue'];

    // protected $app = ['status'];


    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public static function typeData($id = null) {
        $data = [
            1 => "Checkbox",
            2 => "Dropdown",
            3 => "Multiple Images",
            4 => "Textbox",
            5 => "Textarea",
            6 => "Image",
            7 => "Date",
            8 => "Google AutoComplete"
        ];
        return ($id) ? $data[$id] : $data;
    }

    public static function typeStatus($id = null) {
        $status = [
            1 => "Active",
            0 => "Deactive",
        ];
        return ($id) ? $status[$id] : $status;
    }


    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function attributegroup() {
        return $this->belongsTo(Attributegroup::class);
    }

    public function attributesdata() {
        return $this->hasMany(AttributesValue::class, 'attributes_id');
    }

    public function advertisement_data(){
        return $this->hasMany(AdvertisementValue::class,'attributes_id','id');
    }



    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    public function getTypeNameAttribute() {
        return ($this->category_type) ? $this->typeData($this->category_type) : '-';
    }
    public function getIsDefaultNameAttribute($val) {
        return (isset($this->is_default) && $this->is_default == '1') ? 'Yes' : 'No';
    }
    public function getIsCompulsoryNameAttribute() {
        return (isset($this->compulsory) && $this->compulsory == '1') ? 'Yes' : 'No';
    }

    public function getStatusNameAttribute() {
        return ($this->status) ? $this->typeStatus($this->status) : 'Deactive';
    }

    public function getAttributesvalueAttribute() {
        return ($this->attributesdata) ? $this->attributesdata : [];
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

}
