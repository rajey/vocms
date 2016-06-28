<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TruckConfiguration extends Model
{
    public $timestamps = false;

    protected $fillable = ['configuration', 'gross_mass'];

    public function truck() {

      return $this->hasMany('App\Models\Truck');
    }
}
