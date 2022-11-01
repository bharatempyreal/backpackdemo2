<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Spatie\Permission\Traits\HasRoles;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, CrudTrait, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['profile'];

    public function getProfileAttribute() {
        return (isset($this->profile_pic)) ? 'storage/image/'.$this->profile_pic : '';
    }
    public function setLastnameAttribute($val) {
        $this->attributes['name'] = (isset($this->attributes['firstname']) ? $this->attributes['firstname'] : ''). ' ' . (isset($val) ? $val : '');
        $this->attributes['lastname'] = $val;
    }
    public function setFirstnameAttribute($val) {
        $this->attributes['name'] =  (isset($val) ? $val : '') . ' ' . (isset($this->attributes['lastname']) ? $this->attributes['lastname'] : '');
        $this->attributes['firstname'] = $val;
    }

    public function setProfilePicAttribute($value)
    {
        $attribute_name = "profile_pic";
        // destination path relative to the disk above
        $destination_path = "public/image";

        // if the image was erased
        if ($value==null) {
            // delete the image from disk
            Storage::delete($this->{$attribute_name});

            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }

        // if a base64 was sent, store it in the db
        if (Str::startsWith($value, 'data:image'))
        {
            // dd('2');
            // 0. Make the image
            $image = Image::make($value)->encode('jpg', 90);

            // 1. Generate a filename.
            $filename = md5($value.time()).'.jpg';

            // 2. Store the image on disk.
            Storage::put($destination_path.'/'.$filename, $image->stream());

            // 3. Delete the previous image, if there was one.
            // if ($value !=null) {
            $path = storage_path('/app/public/image/'). $this->{$attribute_name};
                if (file_exists($path)) {
                    unlink($path);
                }
            // }
            // 4. Save the public path to the database
            // but first, remove "public/" from the path, since we're pointing to it
            // from the root folder; that way, what gets saved in the db
            // is the public URL (everything that comes after the domain name)
            $public_destination_path = Str::replaceFirst('public/', 'storage/', $destination_path);
            $this->attributes[$attribute_name] = $filename;
        }else{
            // dd($value);
            $val =  explode('/', $value);
            // dd($val[array_key_last($val)]);
            $this->attributes[$attribute_name] = $val[array_key_last($val)];
        }
    }
}
