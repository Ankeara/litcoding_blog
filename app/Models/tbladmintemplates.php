<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbladmintemplates extends Model
{
    use HasFactory;

    protected $table = 'admintemplates';

    protected $fillable = [
        'creator_id',
        'title',
        'category_id',
        'sub_category_id',
        'image_admintm',
        'description_header',
        'title_video_admintm',
        'video_admintm',
        'description_video_admintm',
        'header_admintm',
        'description_admintm_one',
        'code_one',
        'description_admintm_two',
        'code_two',
        'description_admintm_tree',
        'code_tree',
        'description_admintm_four',
        'code_four',
        'description_admintm_five',
        'code_five',
        'description_admintm_six',
        'code_six',
        'description_admintm_seven',
        'code_seven',
        'description_admintm_eight',
        'code_eight',
        'description_admintm_nine',
        'code_nine',
        'description_admintm_ten',
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