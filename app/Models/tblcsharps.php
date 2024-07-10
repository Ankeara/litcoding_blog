<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblcsharps extends Model
{
    use HasFactory;
     protected $fillable = [
        'creator_id',
        'title',
        'category_id',
        'sub_category_id',
        'image_csharp',
        'description_header',
        'title_video_csharp',
        'video_csharp',
        'description_video_csharp',
        'header_csharp',
        'description_csharp_one',
        'code_one',
        'description_csharp_two',
        'code_two',
        'description_csharp_tree',
        'code_tree',
        'description_csharp_four',
        'code_four',
        'description_csharp_five',
        'code_five',
        'description_csharp_six',
        'code_six',
        'description_csharp_seven',
        'code_seven',
        'description_csharp_eight',
        'code_eight',
        'description_csharp_nine',
        'code_nine',
        'description_csharp_ten',
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
