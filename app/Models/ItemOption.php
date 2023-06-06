<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ItemOption
 * @package App\Models
 * @version December 24, 2021, 8:43 am UTC
 *
 * @property string $type
 * @property string $material
 * @property string $state
 * @property string $origin
 * @property string $how_own
 * @property string $where_saved
 * @property string $from_when
 */
class ItemOption extends Model
{
 

    use HasFactory;

    public $table = 'item_options';




    public $fillable = [
        'type',
        'material',
        'state',
        'origin',
        'how_own',
        'where_saved',
        'from_when'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'type' => 'string',
        'material' => 'string',
        'state' => 'string',
        'origin' => 'string',
        'how_own' => 'string',
        'where_saved' => 'string',
        'from_when' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */


    public function description()
    {
       return $this->hasMany(ItemOptionDescription::class,'item_option_id');
    }
}
