<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Js extends Model
{
    use HasFactory;
    protected $fillable = [
        'creator_id',
        'title',
        'category_id',
        'sub_category_id',
        'image_js',
        'description_header',
        'title_video_js',
        'video_js',
        'description_video_js',
        'header_js',
        'description_js_one',
        'html_code',
        'description_css',
        'css_code',
        'description_js',
        'js_code',
        'last_description'
    ];

    public function templates()
    {
        return $this->hasMany(Template::class, 'id_js');
    }

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