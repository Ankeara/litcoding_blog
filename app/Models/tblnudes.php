<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblnudes extends Model
{
    use HasFactory;
      protected $fillable = [
        'creator_id',
        'title',
        'category_id',
        'sub_category_id',
        'image_nude',
        'description_header',
        'title_video_nude',
        'video_nude',
        'description_video_nude',
        'header_nude',
        'description_nude_one',
        'model_code',
        'description_nude_two',
        'controller_code',
        'description_nude_tree',
        'view_code',
        'last_description'
    ];

}
