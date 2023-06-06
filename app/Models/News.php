<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class News
 * @package App\Models
 * @version December 21, 2021, 4:42 pm UTC
 *
 * @property string $tittle
 * @property string $body
 */
class News extends Model
{


    use HasFactory;

    public $table = 'news';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'tittle',
        'body'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tittle' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tittle' => 'required',
        'body' => 'required'
    ];
    public function newsImages()
    {
       return $this->hasMany(NewsImage::class,'news_id');
    }

    public function newsLinks()
    {
       return $this->hasMany(NewsLink::class,'news_id');
    }
    
}
