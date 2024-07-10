<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblflutters extends Model
{
    use HasFactory;

     protected $fillable = [
        'creator_id',
        'title',
        'category_id',
        'sub_category_id',
        'image_flutter',
        'description_header',
        'title_video_flutter',
        'video_flutter',
        'description_video_flutter',
        'header_flutter',
        'description_flutter_one',
        'code_one',
        'description_flutter_two',
        'code_two',
        'description_flutter_tree',
        'code_tree',
        'description_flutter_four',
        'code_four',
        'description_flutter_five',
        'code_five',
        'description_flutter_six',
        'code_six',
        'description_flutter_seven',
        'code_seven',
        'description_flutter_eight',
        'code_eight',
        'description_flutter_nine',
        'code_nine',
        'description_flutter_ten',
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
