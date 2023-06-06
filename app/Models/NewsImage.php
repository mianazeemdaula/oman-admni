<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class NewsImage
 * @package App\Models
 * @version December 21, 2021, 4:44 pm UTC
 *
 * @property string $image
 * @property string $name
 * @property integer $news_id
 */
class NewsImage extends Model
{


    use HasFactory;

    public $table = 'news_images';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'image',
        'name',
        'news_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'image' => 'string',
        'name' => 'string',
        'news_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'image' =>'required',
        // 'images.*' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        'news_id' => 'required|exists:news,id'
    ];

    
    public function news()
    {
       return $this->belongsTo(News::class);
    }

    
}
