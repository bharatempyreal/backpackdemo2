<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "business";
    protected $fillable = [
        'user_id',
        'businessname',
        'email',
        'phone',
        'address',
        'landmark',
        'city',
        'state',
        'zipcode',
        'bioinformation',
        'asset_name',
        'asset_type',
        'asset_image',
        'asset_address',
        'asset_landmark',
        'asset_city',
        'asset_state',
        'asset_zipcode',
        'asset_advertisement_requirements',
        'asset_property_gallery',
    ];
}
