<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class State
 * @package App\Models
 * @version December 20, 2021, 3:13 pm UTC
 *
 * @property string $name
 * @property integer $city_id
 */
class State extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'states';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'city_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'city_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'city_id' => 'required|numeric|exists:cities,id'
    ];


    public function city()
    {
       return $this->belongsTo(City::class);
    }

    
}
