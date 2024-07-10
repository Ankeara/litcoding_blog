<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Htmlcss extends Model
{
    use HasFactory;

    protected $table = 'htmlcss'; // Specify the table name here

    protected $fillable = [
        'creator_id',
        'title',
        'category_id',
        'sub_category_id',
        'image_html',
        'description_header',
        'title_video_html',
        'video_html',
        'description_video_html',
        'header_html',
        'description_html',
        'html_code',
        'description_css',
        'css_code',
        'description_js',
        'js_code',
        'last_description'
    ];


    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'creator_id'); // Assuming the foreign key is creator_id
    }

    // Define the relationship with the Category model
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    // Define the relationship with the Subcategory model
    public function subcategory()
    {
        return $this->belongsTo(Sub_categories::class , 'sub_category_id');
    }
}