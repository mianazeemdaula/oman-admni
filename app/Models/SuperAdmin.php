<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use GoldSpecDigital\LaravelEloquentUUID\Foundation\Auth\User as Authenticatable;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
/**
 * Class SuperAdmin
 * @package App\Models
 * @version March 4, 2022, 8:22 am UTC
 *
 * @property string $username
 * @property string $password
 */
class SuperAdmin extends Authenticatable
{
    // use SoftDeletes;

    use HasFactory,HasApiTokens,  Uuid;

    public $table = 'super_admins';
    

    protected $dates = ['deleted_at'];


    protected $hidden = [
        'password',
       
    ];
    public $fillable = [
        'username',
        'password'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'username' => 'string',
        'password' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'username' => 'required',
        'password' => 'required'

    ];

    // public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = bcrypt($password);
    // }

    
}
