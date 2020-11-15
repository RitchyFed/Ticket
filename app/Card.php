<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    public function com()
    {
        return $this->hasMany('App\Com');
    }
}
