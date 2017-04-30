<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

//    public function goods()
//    {
//        return $this->hasMany('Good', 'category_id', 'id');
//    }
}
