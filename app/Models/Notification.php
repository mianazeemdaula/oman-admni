<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Notification
 * @package App\Models
 * @version February 5, 2022, 12:37 pm UTC
 *
 * @property string $user_id
 * @property integer $item_id
 * @property integer $case
 * @property string $tittle
 * @property string $body
 * @property boolean $seen
 */
class Notification extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'notifications';
    

    // protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'item_id',
        'case',
        'tittle',
        'body',
        'reason',
        'seen'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'string',
        'item_id' => 'integer',
        'case' => 'integer',
        'tittle' => 'string',
        'body' => 'string',
        'reason' => 'string',
        'seen' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function user()
    {
       return $this->belongsTo(User::class);

    }
    public function organization()
    {
       return $this->belongsTo(Organization::class , 'user_id');
    }
    public function item()
    {
       return $this->belongsTo(Item::class );
    }


    
}
