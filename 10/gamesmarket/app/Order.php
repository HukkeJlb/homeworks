<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function good()
    {
        return $this->belongsTo('App\Good');
    }
}
