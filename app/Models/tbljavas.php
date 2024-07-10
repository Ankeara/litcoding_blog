<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbljavas extends Model
{
    use HasFactory;
    protected $fillable = [
        'creator_id',
        'title',
        'category_id',
        'sub_category_id',
        'image_java',
        'description_header',
        'title_video_java',
        'video_java',
        'description_video_java',
        'header_java',
        'description_java_one',
        'code_one',
        'description_java_two',
        'code_two',
        'description_java_tree',
        'code_tree',
        'description_java_four',
        'code_four',
        'description_java_five',
        'code_five',
        'description_java_six',
        'code_six',
        'description_java_seven',
        'code_seven',
        'description_java_eight',
        'code_eight',
        'description_java_nine',
        'code_nine',
        'description_java_ten',
        'code_ten',
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
