<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class UserUpdate
 * @package App\Models
 * @version February 1, 2022, 9:38 am UTC
 *
 * @property string $user_id
 * @property string $status
 * @property string $first_name
 * @property string $second_name
 * @property string $clan
 * @property string $city
 * @property string $state
 * @property string $village
 * @property string $location
 * @property string $address
 * @property string $phone
 * @property string $id_number
 * @property string $email
 * @property string $background_location
 * @property string $id_picture
 * @property string $picture
 */
class UserUpdate extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'user_updates';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'status',
        'first_name',
        'second_name',
        'third_name',

        'clan',
        'city',
        'state',
        'village',
        'location',
        'address',
        'phone',
        'id_number',
        'email',
        'background_location',
        'id_picture',
        'picture'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'string',
        'status' => 'string',
        'first_name' => 'string',
        'second_name' => 'string',
        'third_name' => 'string',

        'clan' => 'string',
        'city' => 'string',
        'state' => 'string',
        'village' => 'string',
        'location' => 'string',
        'address' => 'string',
        'phone' => 'string',
        'id_number' => 'string',
        'email' => 'string',
        'background_location' => 'string',
        'id_picture' => 'string',
        'picture' => 'string'
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

        'clan' => 'required',
        'city' => 'required',
        'state' => 'required',
        'village' => 'required',
        'location' => 'required',
        'address' => 'required',
        'phone' => 'required|numeric',
        'id_number' => 'required',
        'email' => 'required|email',
        'background_location' => 'required',
        'id_picture' => 'required',
        'picture' => 'required'
    ];

    public function user()
    {
       return $this->belongsTo(User::class);
    }

}
