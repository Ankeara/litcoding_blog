<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_categories extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function htmlcsses()
    {
        return $this->hasMany(Htmlcss::class);
    }

    public function reactjs()
    {
        return $this->belongsTo(tblreacts::class, 'sub_category_id');
    }

    public function php()
    {
        return $this->belongsTo(tblphps::class, 'sub_category_id');
    }

    public function linux()
    {
        return $this->belongsTo(tbllinuxs::class, 'sub_category_id');
    }
}