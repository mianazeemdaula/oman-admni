<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class HomeImage
 * @package App\Models
 * @version December 21, 2021, 2:43 pm UTC
 *
 * @property string $image
 */
class HomeImage extends Model
{
  

    use HasFactory;

    public $table = 'home_images';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'image',
        'name',
        'tittle'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'image' => 'string',
        'name' =>'string',
        'tittle' =>'string'

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
    
        'image' => 'required'
    ];

    
}
