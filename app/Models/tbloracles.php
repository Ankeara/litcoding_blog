<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbloracles extends Model
{
    use HasFactory;

    protected $fillable = [
        'creator_id',
        'title',
        'category_id',
        'sub_category_id',
        'image_oracle',
        'description_header',
        'title_video_oracle',
        'video_oracle',
        'description_video_oracle',
        'header_oracle',
        'description_oracle_one',
        'code_one',
        'description_oracle_two',
        'code_two',
        'description_oracle_tree',
        'code_tree',
        'description_oracle_four',
        'code_four',
        'description_oracle_five',
        'code_five',
        'description_oracle_six',
        'code_six',
        'description_oracle_seven',
        'code_seven',
        'description_oracle_eight',
        'code_eight',
        'description_oracle_nine',
        'code_nine',
        'description_oracle_ten',
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
