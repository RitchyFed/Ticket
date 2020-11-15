<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    public function liste()
    {
        return $this->hasMany('App\Liste');
    }
}
