<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function districts() {

      return $this->hasMany('App\Models\District')->select(['id', 'name']);
    }
}
