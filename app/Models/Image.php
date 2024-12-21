<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $guarded=[];

    function imageable(){
        return $this->morphTo();
    }
}

//لجعل المودل يدخل على الاتا بيز من دوم مشكلة
