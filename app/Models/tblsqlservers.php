<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblsqlservers extends Model
{
    use HasFactory;
    protected $fillable = [
        'creator_id',
        'title',
        'category_id',
        'sub_category_id',
        'image_sqlserver',
        'image_sqlserver',
        'description_header',
        'title_video_sqlserver',
        'video_sqlserver',
        'description_video_sqlserver',
        'header_sqlserver',
        'description_sqlserver_one',
        'code_one',
        'description_sqlserver_two',
        'code_two',
        'description_sqlserver_tree',
        'code_tree',
        'description_sqlserver_four',
        'code_four',
        'description_sqlserver_five',
        'code_five',
        'description_sqlserver_six',
        'code_six',
        'description_sqlserver_seven',
        'code_seven',
        'description_sqlserver_eight',
        'code_eight',
        'description_sqlserver_nine',
        'code_nine',
        'description_sqlserver_ten',
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