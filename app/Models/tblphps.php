<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblphps extends Model
{
    use HasFactory;
     protected $fillable = [
        'creator_id',
        'title',
        'category_id',
        'sub_category_id',
        'image_php',
        'description_header',
        'title_video_php',
        'video_php',
        'description_video_php',
        'header_php',
        'description_php_one',
        'code_one',
        'description_php_two',
        'code_two',
        'description_php_tree',
        'code_tree',
        'description_php_four',
        'code_four',
        'description_php_five',
        'code_five',
        'description_php_six',
        'code_six',
        'description_php_seven',
        'code_seven',
        'description_php_eight',
        'code_eight',
        'description_php_nine',
        'code_nine',
        'description_php_ten',
        'code_ten',
        'download_file',
        'last_description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class ,'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Sub_categories::class , 'sub_category_id');
    }
}