<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class City
 * @package App\Models
 * @version December 20, 2021, 3:10 pm UTC
 *
 * @property string $name
 */
class City extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'cities';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    public function states()
    {
       return $this->hasMany(State::class,'city_id');
    }

    
}
