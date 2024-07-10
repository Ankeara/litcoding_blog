<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbltemplates extends Model
{
    use HasFactory;

    protected $table = 'templates';

    protected $fillable = [
        'creator_id',
        'title',
        'category_id',
        'sub_category_id',
        'image_template',
        'description_header',
        'title_video_template',
        'video_template',
        'description_video_template',
        'header_template',
        'description_template_one',
        'code_one',
        'description_template_two',
        'code_two',
        'description_template_tree',
        'code_tree',
        'description_template_four',
        'code_four',
        'description_template_five',
        'code_five',
        'description_template_six',
        'code_six',
        'description_template_seven',
        'code_seven',
        'description_template_eight',
        'code_eight',
        'description_template_nine',
        'code_nine',
        'description_template_ten',
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