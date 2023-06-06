<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Loan
 * @package App\Models
 * @version December 30, 2021, 7:38 pm UTC
 *
 * @property string $from
 * @property string $to
 * @property string $start
 * @property string $end
 * @property string $status
 * @property integer $item_id
 */
class Loan extends Model
{
   //  use SoftDeletes;

    use HasFactory;

    public $table = 'loans';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'from',
        'to',
        'start',
        'end',
        'status',
        'item_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'from' => 'string',
        'to' => 'string',
        'start' => 'string',
        'end' => 'string',
        'status' => 'string',
        'item_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
       
        'to' => 'required',
        'start' => 'required',
        'end' => 'required',
        'item_id' => 'required|exists:items,id'
    ];

    public function userFrom()
    {
       return $this->belongsTo(User::class,'from');
    }

    public function userTo()
    {
       return $this->belongsTo(User::class,'to');
    }
    
    public function organizationFrom()
    {
       return $this->belongsTo(Organization::class,'from');
    }

    public function organizationTo()
    {
       return $this->belongsTo(Organization::class,'to');
    }

    public function item()
    {
       return $this->belongsTo(Item::class);
    }
    
}
