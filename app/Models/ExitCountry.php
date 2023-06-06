<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ExitCountry
 * @package App\Models
 * @version January 25, 2022, 8:24 pm UTC
 *
 * @property string $item_id
 * @property string $status
 * @property string $reason
 * @property string $where
 * @property string $from
 * @property string $to
 */
class ExitCountry extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'exit_countries';
    

    // protected $dates = ['deleted_at'];



    public $fillable = [
        'item_id',
        'status',
        'reason',
        'where',
        'from',
        'to'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'item_id' => 'integer',
        'status' => 'string',
        'reason' => 'string',
        'where' => 'string',
        'from' => 'string',
        'to' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'item_id' => 'required|exists:items,id',
        'reason' => 'required',
        'where' => 'required',
        'from' => 'required',
        'to' => 'required'
    ];
    public function item()
    {
       return $this->belongsTo(Item::class);
    }
    
}
