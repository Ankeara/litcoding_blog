<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblpythons extends Model
{
    use HasFactory;

     protected $fillable = [
        'creator_id',
        'title',
        'category_id',
        'sub_category_id',
        'image_python',
        'description_header',
        'title_video_python',
        'video_python',
        'description_video_python',
        'header_python',
        'description_python_one',
        'code_one',
        'description_python_two',
        'code_two',
        'description_python_tree',
        'code_tree',
        'description_python_four',
        'code_four',
        'description_python_five',
        'code_five',
        'description_python_six',
        'code_six',
        'description_python_seven',
        'code_seven',
        'description_python_eight',
        'code_eight',
        'description_python_nine',
        'code_nine',
        'description_python_ten',
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
