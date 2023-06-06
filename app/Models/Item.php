<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Item
 * @package App\Models
 * @version December 24, 2021, 11:47 am UTC
 *
 * @property string $registration_number
 * @property string $type
 * @property string $type_description
 * @property string $material
 * @property string $common_name
 * @property string $description
 * @property string $state
 * @property string $origin
 * @property string $how_own
 * @property string $where_saved
 * @property string $from_when
 * @property string $length
 * @property string $width
 * @property strinh $hight
 * @property string $diameter
 * @property string $weight
 * @property integer $count
 * @property string $time_details
 * @property string $background_location
 * @property integer $special_item
 * @property string $status
 * @property string $user_id
 * @property string $qr
 */
class Item extends Model
{
    

    use HasFactory;

    public $table = 'items';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'registration_number',
        'type',
        'type_description',
        'material',
        'common_name',
        'description',
        'state',
        'origin',
        'how_own',
        'where_saved',
        'from_when',
        'length',
        'width',
        'hight',
        'diameter',
        'weight',
        'count',
        'time_details',
        'background_location',
        'special_item',
        'status',
        'user_id',
        'qr'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'registration_number' => 'string',
        'type' => 'string',
        'type_description' => 'string',
        'material' => 'string',
        'common_name' => 'string',
        'description' => 'string',
        'state' => 'string',
        'origin' => 'string',
        'how_own' => 'string',
        'where_saved' => 'string',
        'from_when' => 'string',
        'length' => 'string',
        'width' => 'string',
        'diameter' => 'string',
        'weight' => 'string',
        'count' => 'integer',
        'time_details' => 'string',
        'background_location' => 'string',
        'special_item' => 'integer',
        'status' => 'string',
        'user_id' => 'string',
        'qr' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'type' => 'required',
        'type_description' => 'required',
        'material' => 'required',
        'state' => 'required',
        'origin' => 'required',
        'how_own' => 'required',
        'where_saved' => 'required',
        'from_when' => 'required',
    ];

    
    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function organization()
    {
       return $this->belongsTo(Organization::class,'user_id');
    }

    public function itemImages()
    {
       return $this->hasMany(ItemImage::class,'item_id');
    }

    public function asks()
    {
       return $this->hasMany(Ask::class,'item_id');
    }

    public function sells()
    {
       return $this->hasMany(Sell::class,'item_id');
    }
    public function loans()
    {
       return $this->hasMany(Loan::class,'item_id');
    }
    public function exit()
    {
       return $this->hasMany(ExitCountry::class,'item_id');
    }

    public function notifications()
    {
       return $this->hasMany(Notification::class,'item_id');
    }

    
}
