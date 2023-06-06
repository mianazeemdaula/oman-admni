<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class NewsLinks
 * @package App\Models
 * @version December 21, 2021, 4:45 pm UTC
 *
 * @property string $link
 * @property bigIntger $news_id
 */
class NewsLink extends Model
{

    use HasFactory;

    public $table = 'news_links';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'link',
        'news_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'link' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'links' =>'array|required',
        'links.*' => 'required',
        'news_id' => 'required:exists:news,id'
    ];

    
    public function news()
    {
       return $this->belongsTo(News::class);
    }

    
}
