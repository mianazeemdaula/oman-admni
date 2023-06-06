<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Ask
 * @package App\Models
 * @version December 26, 2021, 9:11 am UTC
 *
 * @property string $name
 * @property integer $item_id
 * @property string $status
 */
class Ask extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'asks';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'item_id',
        'status',
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'item_id' => 'integer',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'item_id' => 'required|exists:items,id'
    ];


    public function item()
    {
       return $this->belongsTo(Item::class);
    }
    
}
