<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblreacts extends Model
{
    use HasFactory;

    protected $fillable = [
        'creator_id',
        'title',
        'category_id',
        'sub_category_id',
        'image_react',
        'description_header',
        'title_video_react',
        'video_react',
        'description_video_react',
        'header_react',
        'description_react_one',
        'model_code',
        'description_react_two',
        'controller_code',
        'description_react_tree',
        'view_code',
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