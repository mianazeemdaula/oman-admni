<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ItemOptionDescripton
 * @package App\Models
 * @version December 24, 2021, 9:09 am UTC
 *
 * @property integer $item_option_id
 * @property string $descripton
 */
class ItemOptionDescription extends Model
{
    
    use HasFactory;

    public $table = 'item_option_descriptions';
    



    public $fillable = [
        'item_option_id',
        'descripton'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'item_option_id' => 'integer',
        'descripton' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function itemOption()
    {
       return $this->belongsTo(itemOption::class);
    }

}
