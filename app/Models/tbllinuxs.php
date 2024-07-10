<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbllinuxs extends Model
{
    use HasFactory;

     protected $fillable = [
        'creator_id',
        'title',
        'category_id',
        'sub_category_id',
        'image_linux',
        'description_header',
        'title_video_linux',
        'video_linux',
        'description_video_linux',
        'header_linux',
        'description_linux_one',
        'code_one',
        'description_linux_two',
        'code_two',
        'description_linux_tree',
        'code_tree',
        'description_linux_four',
        'code_four',
        'description_linux_five',
        'code_five',
        'description_linux_six',
        'code_six',
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
