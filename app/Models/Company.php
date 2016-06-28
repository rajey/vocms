<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DB;

class Company extends Model
{

    protected $fillable = [
    	'name',
    	'box_number',
    	'email',
    	'district',
      'status'
    ];


    public function trucks() {

      return $this->hasMany('App\Models\Truck');
    }

    public function getTruckCountAttribute() {

      return $this->trucks()->count();
    }

    public function location() {

      return $this->hasOne('App\Models\CompanyLocation')
                  ->select('company_id', 'district_id');
    }

    public function phone() {

      return $this->hasMany('App\Models\CompanyPhone');
    }
}
