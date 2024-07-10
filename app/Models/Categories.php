<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsTo(Categories::class,);
    }

    public function Htmlcss()
    {
        return $this->hasMany(Htmlcss::class, 'category_id');
    }
   public function js()
    {
        return $this->hasMany(Js::class, 'category_id');
    }

    public function reactjs()
    {
        return $this->hasMany(tblreacts::class, 'category_id');
    }

    public function linux()
    {
        return $this->hasMany(tbllinuxs::class, 'category_id');
    }

    public function php()
    {
        return $this->hasMany(tblphps::class, 'category_id');
    }

    public function laravel()
    {
        return $this->hasMany(tbllaravels::class, 'category_id');
    }

    public function mysql()
    {
        return $this->hasMany(mysqltb::class, 'category_id');
    }

    public function sqlserver()
    {
        return $this->hasMany(tblsqlservers::class, 'category_id');
    }

    public function oracle()
    {
        return $this->hasMany(tbloracles::class, 'category_id');
    }
    public function flutter()
    {
        return $this->hasMany(tblflutters::class, 'category_id');
    }

    public function python()
    {
        return $this->hasMany(tblpythons::class, 'category_id');
    }

    public function csharp()
    {
        return $this->hasMany(tblcsharps::class, 'category_id');
    }

    public function java()
    {
        return $this->hasMany(tbljavas::class, 'category_id');
    }
}