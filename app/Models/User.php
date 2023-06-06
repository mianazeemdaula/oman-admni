<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Passport\HasApiTokens;
use GoldSpecDigital\LaravelEloquentUUID\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
/**
 * Class User
 * @package App\Models
 * @version December 19, 2021, 1:34 pm UTC
 *
 * @property string $first_name
 * @property string $second_name
 * @property string $third_name
 * @property integer $phone
 * @property string $clan
 * @property integer $id_number
 * @property string $email
 * @property string $city
 * @property string $state
 * @property string $village
 * @property string $location
 * @property string $address
 * @property string $picture
 */
class User extends Authenticatable
{
    use HasApiTokens,HasFactory,SoftDeletes;


    public $table = 'users';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'first_name',
        'second_name',
        'third_name',
        'phone',
        'clan',
        'id_number',
        'email',
        'city',
        'state',
        'village',
        'location',
        'address',
        'picture',
        'device_token',
        'user_type',
        'background_location',
        'id_picture'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'first_name' => 'string',
        'second_name' => 'string',
        'third_name' => 'string',
        'phone' => 'string',
        'clan' => 'string',
        'id_number' => 'string',
        'email' => 'string',
        'city' => 'string',
        'state' => 'string',
        'village' => 'string',
        'location' => 'string',
        'address' => 'string',
        'picture' => 'string',
        'id_picture' => 'string',
        'background_location' => 'string',


    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'first_name' => 'required',
        'second_name' => 'required',
        'third_name' => 'required',
        'phone' => 'required|unique:users|numeric|unique:organizations',
        'clan' => 'required',
        'id_number' => 'required|unique:users|numeric|unique:organizations',
        'email' => 'email|required|unique:users|unique:organizations',
        'city' => 'required',
        'state' => 'required',
        'village' => 'required',
        'location' => 'required',
        'background_location' => 'required',
      //   'picture' => 'image|mimes:jpg,png,jpeg,gif,svg',
      //   'id_picture' => 'image|mimes:jpg,png,jpeg,gif,svg',

        
    ];

    public function items()
    {
       return $this->hasMany(Item::class,'user_id');
    }

    public function buildings()
    {
       return $this->hasMany(Building::class,'user_id');
    }


    public function sellFrom()
    {
       return $this->hasMany(Sell::class,'from');
    }

    public function sellTo()
    {
       return $this->hasMany(Sell::class,'to');
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
       return $this->hasMany(UserUpdate::class,'user_id');
    }
    public function notifications()
    {
       return $this->hasMany(Notification::class,'user_id');
    }
}
