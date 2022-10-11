<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;


class Contactas extends Model
{
    use CrudTrait;
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "contactas";
    protected $fillable = [
        'name',
        'email',
        'subject',
        'phone',
        'message',
    ];
}

