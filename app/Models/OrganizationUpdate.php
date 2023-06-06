<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class OrganizationUpdate
 * @package App\Models
 * @version February 2, 2022, 7:25 am UTC
 *
 * @property string $name
 * @property string $organization_type
 * @property string $organization_id
 * @property string $status
 * @property string $city
 * @property string $user_name
 * @property string $state
 * @property string $village
 * @property string $location
 * @property strin $address
 * @property string $phone
 * @property string $id_number
 * @property string $email
 * @property string $background_location
 * @property string $logo
 * @property string $id_picture
 */
class OrganizationUpdate extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'organization_updates';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'organization_type',
        'organization_id',
        'status',
        'city',
        'user_name',
        'state',
        'village',
        'location',
        'address',
        'phone',
        'id_number',
        'email',
        'background_location',
        'logo',
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
        'organization_id' => 'string',
        'status' => 'string',
        'city' => 'string',
        'user_name' => 'string',
        'state' => 'string',
        'village' => 'string',
        'location' => 'string',
        'phone' => 'string',
        'id_number' => 'string',
        'email' => 'string',
        'background_location' => 'string',
        'logo' => 'string',
        'id_picture' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'organization_type' => 'required',
        'organization_id' => '',
        'status' => '',
        'city' => 'required',
        'user_name' => 'required',
        'state' => 'required',
        'village' => 'required',
        'location' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'id_number' => 'required',
        'email' => 'required|email',
        'background_location' => 'required',
        'id_picture' => 'required'
    ];


    public function organization()
    {
       return $this->belongsTo(Organization::class);
    }

    
}
