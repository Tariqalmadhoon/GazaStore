<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded=[];

    function products(){
        return $this->hasMany(product::class);
    }

    function image(){
        return $this->morphOne(Image::class ,'imageable');
    }
}

//لجعل المودل يدخل على الاتا بيز من دوم مشكلة
