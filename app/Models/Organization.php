<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Passport\HasApiTokens;
use GoldSpecDigital\LaravelEloquentUUID\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
/**
 * Class Organization
 * @package App\Models
 * @version December 20, 2021, 11:18 am UTC
 *
 * @property string $name
 * @property string $organization_type
 * @property string $file_number
 * @property string $city
 * @property string $state
 * @property string $clan
 * @property string $address
 * @property string $user_name
 * @property string $email
 * @property integer $id_number
 * @property integer $phone
 * @property string $location
 * @property string $logo
 * @property integer $user_type
 * @property string $device_token
 */
class Organization extends Authenticatable
{
    use HasApiTokens,HasFactory,SoftDeletes;

    public $table = 'organizations';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'organization_type',
        'city',
        'state',
        'village',
        'address',
        'user_name',
        'email',
        'id_number',
        'phone',
        'location',
        'logo',
        'user_type',
        'device_token',
        'background_location',
        'id_picture'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'organization_type' => 'string',
        'city' => 'string',
        'state' => 'string',
        'village' => 'string',
        'address' => 'string',
        'user_name' => 'string',
        'email' => 'string',
        'id_number' => 'string',
        'phone' => 'string',
        'location' => 'string',
        'logo' => 'string',
        'id_picture' => 'string',
        'user_type' => 'integer',
        'background_location' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'organization_type' => 'required',
        'city' => 'required',
        'state' => 'required',
        'village' => 'required',
        'user_name' => 'required',
        'email' => 'required|unique:organizations|email|unique:users',
        'id_number' => 'required|unique:organizations|numeric|unique:users',
        'phone' => 'required|unique:organizations|numeric|unique:users',
        'location' => 'required',
        'background_location' => 'required',
      //   'logo'=>'image|mimes:jpg,png,jpeg,gif,svg',
      //   'id_picture'=>'required|image|mimes:jpg,png,jpeg,gif,svg'
    ];


    public function sellFrom()
    {
       return $this->hasMany(Sell::class,'from');
    }

    public function sellTo()
    {
       return $this->hasMany(Sell::class,'to');
    }

    public function items()
    {
       return $this->hasMany(Item::class,'user_id');
    }
    
    public function buildings()
    {
       return $this->hasMany(Building::class,'user_id');
    }


    public function loanFrom()
    {
       return $this->hasMany(Loan::class,'from');
    }

    public function loanTo()
    {
       return $this->hasMany(Loan::class,'to');
    }

    public function updates()
    {
       return $this->hasMany(OrganizationUpdate::class,'organization_id');
    }
    public function notifications()
    {
       return $this->hasMany(Notification::class,'user_id');
    }

    
}
