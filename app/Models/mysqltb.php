<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mysqltb extends Model
{
    use HasFactory;

    protected $table = 'mysqltb';
    protected $fillable = [
        'creator_id',
        'title',
        'category_id',
        'sub_category_id',
        'image_mysql',
        'description_header',
        'title_video_mysql',
        'video_mysql',
        'description_video_mysql',
        'header_mysql',
        'description_mysql_one',
        'code_one',
        'description_mysql_two',
        'code_two',
        'description_mysql_tree',
        'code_tree',
        'description_mysql_four',
        'code_four',
        'description_mysql_five',
        'code_five',
        'description_mysql_six',
        'code_six',
        'description_mysql_seven',
        'code_seven',
        'description_mysql_eight',
        'code_eight',
        'description_mysql_nine',
        'code_nine',
        'description_mysql_ten',
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
