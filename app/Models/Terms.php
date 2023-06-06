<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Terms
 * @package App\Models
 * @version February 2, 2022, 4:28 pm UTC
 *
 * @property string $terms
 */
class Terms extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'terms';
    

    // protected $dates = ['deleted_at'];



    public $fillable = [
        'terms'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'terms' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
