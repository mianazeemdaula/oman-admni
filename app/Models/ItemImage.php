<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ItemImage
 * @package App\Models
 * @version December 25, 2021, 12:12 pm UTC
 *
 * @property string $image
 * @property integer $item_id
 * @property string $tittle
 */
class ItemImage extends Model
{
    

    use HasFactory;

    public $table = 'item_images';
    





    public $fillable = [
        'image',
        'item_id',
        'tittle',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'image' => 'string',
        'item_id' => 'integer',
        'tittle' => 'string',
        'name' => 'string'

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'image' => 'required',
        'item_id' => 'required|exists:items,id',
        'tittle' => 'required'
    ];
    

    public function item()
    {
       return $this->belongsTo(Item::class);
    }

    
}
