<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Forget
 * @package App\Models
 * @version December 23, 2021, 5:27 pm UTC
 *
 * @property string $email
 * @property integer $code
 */
class Forget extends Model
{


    use HasFactory;

    public $table = 'forgets';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'email',
        'code'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'email' => 'string',
        'code' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
