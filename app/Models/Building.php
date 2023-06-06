<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Building
 * @package App\Models
 * @version January 8, 2022, 3:44 pm UTC
 *
 * @property string $user_id
 * @property string $type
 * @property string $how_own
 * @property string $property_image
 * @property string $from+_when
 * @property string $room_number
 * @property string $area
 * @property string $dimensions
 * @property string $state
 * @property string $restoration_date
 * @property string $image
 * @property string $city
 * @property string $status
 * @property string $village
 * @property string $neighborhood
 * @property string $location
 */
class Building extends Model
{

    use HasFactory;

    public $table = 'buildings';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'type',
        'how_own',
        'property_image',
        'from_when',
        'room_number',
        'area',
        'dimensions',
        'state',
        'restoration_date',
        'image',
        'city',
        'status',
        'building_status',
        'village',
        'neighborhood',
        'location'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'string',
        'type' => 'string',
        'how_own' => 'string',
        'property_image' => 'string',
        'from_when' => 'string',
        'room_number' => 'string',
        'area' => 'string',
        'dimensions' => 'string',
        'state' => 'string',
        'restoration_date' => 'string',
        'image' => 'string',
        'city' => 'string',
        'status' => 'string',
        'building_status' => 'string',
        'village' => 'string',
        'neighborhood' => 'string',
        'location' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'type' => 'required',
        'how_own' => 'required',
        'state' => 'required',
        'city' => 'required',
        'building_status' => 'required',
        'village' => 'required',
        // 'image'=>'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        // 'property_image'=>'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
    ];

    protected $hidden = ['deleted_at'];
    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function organization()
    {
       return $this->belongsTo(Organization::class,'user_id');
    }

    
}
